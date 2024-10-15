<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contribution;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class PostController extends Controller
{
    public function list()
    {
        if(!Gate::allows('post/list')) {
            return view('error-404/error-404');
        }

        $coordinator = Auth::user();

        $posts = Contribution::where('faculty_id', $coordinator->faculty_id)->simplepaginate(10);

        return view("coordinator/post/list", compact('posts'));

    }

    public function edit($id)
    {
        if(!Gate::allows('post/edit')) {
            return view('error-404/error-404');
        }

        $post = Contribution::find($id);
        $post_status = Contribution::all();
        return view('coordinator/post/edit', compact('post','post_status'));
    }

    function update(Request $request, $id){
        if(!Gate::allows('post/edit')) {
            return view('error-404/error-404');
        }

        $request->validate([
            'status'=>'required',
            'comment'=>'nullable',
            'popular'=>'nullable'
        ]);

        $post = Contribution::find($id);
        $post->status = $request->status;
        $post->comment = $request->comment;
        $post->popular = $request->popular;
        $post->save();
        return redirect('coordinator/post/list')->with('success','Post updated successfully');
        
    }
}
