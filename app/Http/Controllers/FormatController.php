<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\format;
use App\Models\CommentTable;
use Illuminate\Support\Facades\Session;
use Illuminate\Validation\Rule;

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
        // Check if 'file' is not provided
        if (!$request->hasFile('file')) {
            $request->session()->flash('error', 'Please select a file.');
            return redirect()->back();
        }

        // Check if 'journalName' is blank
        if (empty($request->journalName)) {
            $request->session()->flash('error', 'Journal Name cannot be blank.');
            return redirect()->back();
        }

        // Check if 'title' is blank
        if (empty($request->title)) {
            $request->session()->flash('error', 'Title cannot be blank.');
            return redirect()->back();
        }

        // Additional validation if needed, e.g., file type check
        // ...

        $data = new format;

        $data->journal_name = $request->journalName;
        $data->title = $request->title;

        $file = $request->file('file');
        $filename = date('YmdHi') . $file->getClientOriginalName();
        $file->move(public_path('assets'), $filename);
        $data->file_content = $filename;

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