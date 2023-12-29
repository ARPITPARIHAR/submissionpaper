<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\format;
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

        Auth::user()->formats()->save($data);

        $request->session()->flash('centerSuccess', 'Uploaded Successfully!');
        return redirect()->back();
    }


         public function showData()
         {
             $formatData = Format::paginate(5);
             $commentData = CommentTable::all();
         
         
         
             return view('user.showuploaddata')->with(['formatData' => $formatData, 'commentData' => $commentData]);
         }
         
         
  
        }