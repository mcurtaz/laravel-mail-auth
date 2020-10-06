<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Mail\PostAction;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Auth;

class LoggedController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function delete($id){

        $post = Post::findOrFail($id);

        $post -> delete();

        $user = Auth::user();

        $action = "delete";

        Mail::to('admin@gmail.com') -> send(new PostAction($user, $post, $action));

        return redirect() -> route('post-index');
    }

    public function edit($id){

        $post = Post::findOrFail($id);

        return view('posts.edit', compact('post'));
    }

    public function update(Request $request, $id){

        $post = Post::findOrFail($id);

        $data = $request -> all();

        $post -> update($data);

        return redirect() -> route('post-index');
    }

    public function create(){

        return view('posts.create');

    }


    public function store(Request $request){

        $data = $request -> all();

        Post::create($data);

        return redirect() -> route('post-index');
    }
}
