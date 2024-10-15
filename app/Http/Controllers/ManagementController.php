<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contribution;
use Illuminate\Support\Facades\Gate;
use ZipArchive;

class ManagementController extends Controller
{
    function list(){
        if(!Gate::allows('allpost/list')) {
            return view('error-404/error-404');
        }

        $managements = Contribution::where('status', 'approved')
                ->where(function($query) {
                    $query->where('popular', '1')
                          ->orWhere('popular', '0');
                })
                ->get();
        return view ('management/post/list',compact('managements'));
    }

    function zipfile(Request $request)
    {
        $selectedFiles = $request->input('list_check');
    
        // Ensure the selected files array is not empty
        if (empty($selectedFiles)) {
            return redirect('management/allpost/list')->with('danger', 'Download unsuccessfully (You need to select at least one post before downloading !!!)');
        }
    
        // Create a new ZIP file
        $zip = new ZipArchive();
        $filename = 'download.zip'; 
        $zipFilePath = public_path($filename); // Path to store the ZIP file
    
        // Open the ZIP file to start adding files
        if ($zip->open($zipFilePath, ZipArchive::CREATE | ZipArchive::OVERWRITE) === TRUE) {
            foreach ($selectedFiles as $selectedFile) {
                // Find the contribution and check if the file exists
                $file = Contribution::findOrFail($selectedFile);
    
                // Ensure the file exists on the server
                $filePath = public_path($file->upload_file);
                if (file_exists($filePath)) {
                    // Add the file to the ZIP using its basename (file name)
                    $zip->addFile($filePath, basename($filePath));
                } else {
                    return redirect('management/allpost/list')->with('danger', 'Some files could not be found!');
                }
            }
            $zip->close(); // Close the ZIP archive
        } else {
            return redirect('management/allpost/list')->with('danger', 'Download unsuccessfully (There was an error while creating the ZIP file)');
        }
    
        // Provide the ZIP file for download and delete it after sending
        return response()->download($zipFilePath, $filename)->deleteFileAfterSend(true);
    }
}
