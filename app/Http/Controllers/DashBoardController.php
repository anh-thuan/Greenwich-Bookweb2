<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\Contribution;

class DashBoardController extends Controller
{
    function show(){
        $role=Auth::user()->role_id ?? '';

        if($role == '1'){
            return view ('admin/dashboard');
        }
        else if ($role == '2'){
            return view ('coordinator/dashboard');
        }
        else if ($role == '3'){
            return view ('management/dashboard');
        }
        else if ($role == '4'){
            $contributions = Contribution::where('status', 'approved')
                ->where(function($query) {
                    $query->where('popular', '1')
                          ->orWhere('popular', '0');
                })->get();
            return view ('student/dashboard', compact('contributions'));
        }
        else{
            return view ('admin/dashboard');
        }
    }

    function info($id){
        $welcomeinfo = Contribution::find($id);
        return view('studentinfo',compact('welcomeinfo'));
    }
}
