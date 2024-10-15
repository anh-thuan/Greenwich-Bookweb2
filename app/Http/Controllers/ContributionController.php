<?php

namespace App\Http\Controllers;

use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Contribution;
use App\Models\User;
use App\Models\Faculty;
use App\Models\Semester;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use DateTime;
use ZipArchive;

class ContributionController extends Controller
{
    public function list()
    {
        if(!Gate::allows('contribution/list')) {
            return view('error-404/error-404');
        }
        // $student = User::where('id', auth()->id)->firstOrFail();
        $student = Auth::user();

        $contributions = Contribution::where('user_id', $student->id)->simplepaginate(10);

        return view('student/contribution/list', compact('student', 'contributions'));
    }

    function historylist()
    {
        if(!Gate::allows('contribution/historylist')) {
            return view('error-404/error-404');
        }
        // Get contributions for the specified class
        $student = Auth::user();

        // Use withTrashed() to include soft-deleted records
        $histories = Contribution::where('user_id', $student->id)->withTrashed()->get();


        return view('student/contribution/history/list', compact('histories'));
        // return view('student/history/list');
    }

    public function add()
    {
        if(!Gate::allows('contribution/add')) {
            return view('error-404/error-404');
        }

        $student = Auth::user();

        // Retrieve the faculty and the related semester data
        $faculty = Faculty::where('id', $student->faculty_id)->with('semester')->firstOrFail();

        // Retrieve contributions for the student's faculty
        $contributions = Contribution::where('faculty_id', $student->faculty_id)->get();

        return view('student/contribution/add', compact('student', 'contributions', 'faculty'));
    }

    public function store(Request $request)
    {
        if(!Gate::allows('contribution/add')) {
            return view('error-404/error-404');
        }
        // Get the authenticated user's faculty
        $student = Auth::user();
        $faculty = Faculty::where('id', $student->faculty_id)->with('semester')->firstOrFail();

        // Get the semester end date
        $semesterEndDate = $faculty->semester->end_date;

        // Compare the current date with the semester end date
        $currentDate = now();
        $endOfSemester = new \DateTime($semesterEndDate);
        if ($currentDate > $endOfSemester) {
            return redirect('student/contribution/add')->with('error', 'Submissions are not allowed after the end of the semester!');
        }

        // Validate the request data
        $request->validate([
            'name' => 'required',
            'content' => 'required',
            'upload_file' => 'required|file|mimes:doc,docx,pdf',
            'upload_image' => 'required|image|mimes:jpeg,png,jpg,gif',
            'status' => 'required|in:pending,approved,rejected',
            'comment' => 'nullable',
            'popular' => 'nullable'
        ], [
            'status.required' => 'You must accept the terms and conditions',
            'status.in' => 'Invalid status',
        ]);

        // Handle file uploads
        $input = $request->all();
        if ($request->hasFile('upload_file')) {
            $file = $request->file('upload_file');
            $filename = $file->getClientOriginalName();
            $path = $file->move('uploads/file', $filename);
            $input['upload_file'] = 'uploads/file/' . $filename;
        }
        if ($request->hasFile('upload_image')) {
            $file = $request->file('upload_image');
            $filename = $file->getClientOriginalName();
            $path = $file->move('uploads/image', $filename);
            $input['thumbnail'] = 'uploads/image/' . $filename;
        }

        // Assign faculty and semester IDs
        $input['faculty_id'] = $student->faculty_id;
        $input['semester_id'] = $faculty->semester_id;
        $input['user_id'] = Auth::id();

        // Create the Contribution
        Contribution::create($input);

        return redirect('student/contribution/list')->with('success', 'Contribution added successfully');
    }

    public function delete($id)
    {
        if(!Gate::allows('contribution/delete')) {
            return view('error-404/error-404');
        }

        Contribution::where('id', $id)->delete();
        return redirect('student/contribution/list')->with('success', 'Contribution deleted successfully');
    }

    public function edit($id)
    {

        if(!Gate::allows('contribution/edit')) {
            return view('error-404/error-404');
        }

        $student = Auth::user();
        $faculty = Faculty::where('id', $student->faculty_id)->with('semester')->firstOrFail();

        $contribution = Contribution::find($id);
        return view('student/contribution/edit', compact('contribution', 'faculty'));
    }

    public function update(Request $request, $id)
    {
        if(!Gate::allows('contribution/edit')) {
            return view('error-404/error-404');
        }

        $request->validate([
            'name' => 'required',
            'content' => 'required',
            'upload_file' => 'nullable|file|mimes:doc,docx',
            'upload_image' => 'nullable|image|mimes:jpeg,png,jpg,gif',
            'comment' => 'nullable',
            'popular' => 'nullable'
        ]);

        $contribution = Contribution::findOrFail($id); // Find the contribution by its id

        // Update contribution fields
        $contribution->name = $request->name;
        $contribution->content = $request->content;

        // Handle file uploads if provided
        if ($request->hasFile('upload_file')) {
            $file = $request->file('upload_file');
            $filename = time() . '_' . $file->getClientOriginalName();
            $path = $file->move('uploads/file', $filename);
            $contribution->upload_file = $path;
        }

        if ($request->hasFile('upload_image')) {
            $file = $request->file('upload_image');
            $filename = time() . '_' . $file->getClientOriginalName();
            $path = $file->move('uploads/image', $filename);
            $contribution->thumbnail = $path;
        }

        // Save the updated contribution
        $contribution->save(); // Missing in your original code

        return redirect('student/contribution/list')->with('success', 'Contribution edited successfully');
    }

    function info($id)
    {
        $contribution = Contribution::find($id);
        return view('student/contribution/info', compact('contribution'));
    }

    function viewfile(Contribution $contribution)
    {
        $wordFilePath = public_path($contribution->upload_file);

        // Check if the Word file exists
        if (!file_exists($wordFilePath)) {
            abort(404, 'File not found');
        }

        // Return the Word file for download
        return response()->download($wordFilePath);
    }

    function zipfile(Request $request)
    {
        $selectedFiles = $request->input('list_check');

        // Ensure the selected files array is not empty
        if (empty($selectedFiles)) {
            return redirect('student/contribution/list')->with('danger', 'Download unsuccessfully (You need to select at least one post before downloading !!!)');
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
                    return redirect('student/contribution/list')->with('danger', 'Some files could not be found!');
                }
            }
            $zip->close(); // Close the ZIP archive
        } else {
            return redirect('student/contribution/list')->with('danger', 'Download unsuccessfully (There was an error while creating the ZIP file)');
        }

        // Provide the ZIP file for download and delete it after sending
        return response()->download($zipFilePath, $filename)->deleteFileAfterSend(true);
    }
}
