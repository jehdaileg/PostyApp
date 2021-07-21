<?php

namespace App\Http\Controllers;

use App\Mail\PostLiked;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class PostController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {

        $posts = Post::with(['user', 'likes'])->latest()->paginate(10);

        return view('posts.index', compact('posts'));

    }

    public function store(Request $request)
    {
        $this->validate($request, [

            'body'=>'required|max:250'

        ]);

        /* The user_id belongs to the connected user */

       Post::create([

           'user_id'=>Auth::user()->id,
           'body'=>$request->body

       ]);



        return back()->with('success', 'You posted');

    }

    public function destroy(Post $post, Request $request)
    {

        $this->authorize('delete', $post);

        $post->delete();

        return back();
    }

    public function show(Post $post)
    {
        return view('posts.show', compact('post'));
    }
}
