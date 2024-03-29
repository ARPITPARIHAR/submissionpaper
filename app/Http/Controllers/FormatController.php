<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Format;
use App\Models\CommentTable;
use Illuminate\Support\Facades\Session;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;

class FormatController extends Controller
{


     public function __construct()
     {
        $this->middleware('auth')->except('format');
     }
    public function format(){
        return view("user.formating");
    }

    public function multi(){
        return view("user.multiformating");
    }




    public function store(Request $request)
    {
       
        if (!$request->hasFile('file')) {
            $request->session()->flash('error', 'Please select a file.');
            return redirect()->back();
        }

     
        if (empty($request->journalName)) {
            $request->session()->flash('error', 'Journal Name cannot be blank.');
            return redirect()->back();
        }

       
        if (empty($request->title)) {
            $request->session()->flash('error', 'Title cannot be blank.');
            return redirect()->back();
        }

         $user = Auth::user();
        $data = new format;

        $data->journal_name = $request->journalName;
        $data->title = $request->title;

        $file = $request->file('file');
        $filename = date('YmdHi') . $file->getClientOriginalName();
        $file->move(public_path('assets'), $filename);
        $data->file_content = $filename;
        //  $data->save();
         Auth::user()->formats()->save($data);

        $request->session()->flash('centerSuccess', 'Uploaded Successfully!');
        return redirect()->back();
    }
    public function showData()
    {
        $user = Auth::user();
    
        $formatData = $user->formats()->paginate(5);
    
     
        $commentData = CommentTable::with('format')->whereIn('format_id', $formatData->pluck('id'))->paginate(5);
    
        return view('user.showuploaddata')->with(['formatData' => $formatData, 'commentData' => $commentData]);
    }
   
   

    public function destroy(Request $request, $id)
    {
        CommentTable::where('format_id', $id)->delete();  
        Format::find($id)->delete();
    return back()->with('success', 'Student Delete Successfully');
    }
    
}