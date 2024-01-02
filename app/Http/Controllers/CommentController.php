<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\CommentTable;
use App\Models\Format;
use Illuminate\Validation\ValidationException;


class CommentController extends Controller
{
    public function submitForm(Request $request)
    {
        $item = Format::find($request->id);
        
        $commentData = new CommentTable;
        $commentData->format_id = $item->id;
        $commentData->comment = $request->comment;
        $commentData->processed = $request->processed;
    
        if ($request->hasFile('pdf_file')) {
            $file = $request->file('pdf_file');
            $filename = date('YmdHi') . $file->getClientOriginalName();
            $file->move(public_path('assets'), $filename);  
            $commentData->pdf = $filename;
        }
    
        $commentData->url = $request->url;
        $commentData->save();
    
       
         $commentData->update(['submission' => true]);
    
        return redirect()->back();     
    }
    
    
    function getComment(Request $request){
        
        $item=Format::find($request->id);
        return view('partials.comment-modal-body',compact('item'));
    }
    function updateStatus(Request $request)  {
        $item=Format::find($request->id);
        $item->submitted=$request->status;
        $item->update();
        return 1;
    }
}
 