<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Models\Faculty;
use App\Models\Semester;

class FacultyController extends Controller
{
    public function list()
    {
        if(!Gate::allows('faculty/list')) {
            return view('error-404/error-404');
        }

        $faculty = Faculty::all();
        return view('admin/faculty/list',compact('faculty'));
    }

    public function add(){
        if(!Gate::allows('faculty/add')) {
            return view('error-404/error-404');
        }

        $semesters = Semester::all();
        return view('admin/faculty/add', compact('semesters'));

    }

    public function store(Request $request)
    {
        if(!Gate::allows('faculty/add')) {
            return view('error-404/error-404');
        }

        $request->validate([
            'name' => 'required',
            'semester_id' => 'required',
        ]);

        Faculty::create([
            'name' => $request->name,
            'semester_id' => $request->semester_id,
            'description' => $request->description,
        ]);

        return redirect('admin/faculty/list')->with('success', 'Faculty added successfully'); 
    }

    public function delete($id){
        if(!Gate::allows('faculty/delete')) {
            return view('error-404/error-404');
        }

        Faculty::find($id)->forceDelete();
        return redirect('admin/faculty/list')->with('success', 'Faculty deleted successfully');
    }

    public function edit($id){
        if(!Gate::allows('faculty/edit')) {
            return view('error-404/error-404');
        }

        $faculty=Faculty::find($id);
        $semesters = Semester::all();

        return view('admin/faculty/edit', compact('faculty', 'semesters'));
    }

    function update(Request $request, $id){
        if(!Gate::allows('faculty/edit')) {
            return view('error-404/error-404');
        }

        $request->validate([
            'name' => 'required',
            'semester_id' => 'required',
        ]);
    
        Faculty::where('id', $id)->update([
            'name' => $request->name,
            'semester_id' => $request->semester_id,
            'description' => $request->description,
        ]);
        // return dd($request->all()); 
        return redirect('admin/faculty/list')->with('success', 'Faculty updated successfully');
    }
}
