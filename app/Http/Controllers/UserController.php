<?php

namespace App\Http\Controllers;

use App\Models\Faculty;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Role;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    function list(){
        if(!Gate::allows('user/list')) {
            return view('error-404/error-404');
        }

        $users = User::orderByRaw("id = '" . Auth::id() . "' DESC")
             ->orderByRaw("id ASC")
             ->simplePaginate(10);
        return view('admin/user/list',compact('users'));
    }

    function add(){
        if(!Gate::allows('user/add')) {
            return view('error-404/error-404');
        }

        $roles=Role::all();
        $faculties = Faculty::all();
        return view('admin/user/add',compact('roles', 'faculties'));
    }

    function store(Request $request){
        if(!Gate::allows('user/add')) {
            return view('error-404/error-404');
        }

        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:5|max:12',
            'phone' => 'required|min:10|max:10',
            'role_id' => 'required',
        ]);
    

        $facultyId = $request->faculty_id;
        if (empty($facultyId)) {
            $facultyId = null;
        }

        User::create([
            'id' => str_pad(rand(0, 999999), 6, '0', STR_PAD_LEFT),
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'phone' => $request->phone,
            'faculty_id' => $facultyId,
            'role_id' => $request->role_id ?? null

        ]);
    
        return redirect('admin/user/list')->with('success', 'User added successfully');
    }

    function delete($id){
        if(!Gate::allows('user/delete')) {
            return view('error-404/error-404');
        }

        User::where('id',$id)->forceDelete();
        return redirect('admin/user/list')->with('success','User deleted successfully');

    }

    function edit($id) {
        if(!Gate::allows('user/edit')) {
            return view('error-404/error-404');
        }

        $roles = Role::all();
        $faculties = Faculty::all();
        // $faculties=Faculty::all();
        $user = User::where('id', $id)->first();
    
        return view('admin/user/edit', compact('user', 'faculties', 'roles'));
    } 

    function update(Request $request, $id){
        if(!Gate::allows('user/edit')) {
            return view('error-404/error-404');
        }

        $request->validate([
            'name'=>'required',
            'email'=>'required|email',
            'password'=>'required', 
            'phone'=>'required|min:10|max:10',
            'role_id'=>'required',
        ]);

        $facultyId = $request->faculty_id;
        if (empty($facultyId)) {
            $facultyId = null;
        }
    
        User::where('id', $id)->update([
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=>Hash::make($request->password), 
            'phone'=>$request->phone,
            'faculty_id' => $facultyId,
            'role_id' => $request->role_id ?? null
        ]);
    
        return redirect('admin/user/list')->with('success','User updated successfully');
    }
}
