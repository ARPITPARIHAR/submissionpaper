<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\format;

use Illuminate\Support\Facades\Storage;

class PublishController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth')->except('publish', 'download');
    }

    public function publish()
    {
        $data = format::paginate(5); 
        return view("user.publishing")->with('data', $data);
    }
    
    public function download($file)
    {
        
        $fileData = format::where('file_content', $file)->first();

        if ($fileData) {
            // Specify the path to the file
            $filePath = public_path('assets') . DIRECTORY_SEPARATOR . $file;

            // Check if the file exists
            if (file_exists($filePath)) {
                // Perform any additional logic before the download if needed

                // Update the file status to 'downloaded'
                $fileData->status = 'downloaded';
                $fileData->save();

                // Download the file
                return response()->download($filePath, $file);

                // Perform any additional logic after the download if needed
            }
        }

        // If the file doesn't exist or there's an issue, redirect back with an error message
        return redirect()->back()->with('error', 'File not found or unable to download.');
    }

  
 



}





