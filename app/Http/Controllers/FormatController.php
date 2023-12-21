<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\format;
use App\Models\CommentTable;
use Illuminate\Support\Facades\Session;


class FormatController extends Controller
{
    public function format(){
        return view("user.formating");
    }

    public function store(Request $request)
    {
        $data = new format;
    
        $data->journal_name = $request->journalName;
        $data->title = $request->title;
    
        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $filename = date('YmdHi') . $file->getClientOriginalName();
            $file->move(public_path('assets'), $filename);  
            $data->file_content = $filename;
        }
       
        $data->save();
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
