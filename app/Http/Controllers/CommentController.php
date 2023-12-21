<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CommentTable;
use App\Models\format;
class CommentController extends Controller
{
    public function submitForm(Request $request)
    {
        {

           
            $commentData = new CommentTable;
            $commentData->comment = $request->comment;
            $commentData->processed = $request->processed;
            // $commentData->file_id = $request->fileId; 
            if ($request->hasFile('pdf_file')) {
                $file = $request->file('pdf_file');
                $filename = date('YmdHi') . $file->getClientOriginalName();
                $file->move(public_path('assets'), $filename);  
                $commentData->pdf = $filename;
            }
          
            $commentData->url = $request->url;
            $commentData->save();

                return redirect()->back();       }  {
            \Log::error('Error in submitForm: ' . $e->getMessage());
            return response()->json(['error' => 'Internal Server Error'], 500);
        }
    }
    function getComment(Request $request){
        
        $item=format::find($request->id);
        return view('partials.comment-modal-body',compact('item'));
    }
}
 