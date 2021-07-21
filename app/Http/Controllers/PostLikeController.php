<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Mail\PostLiked;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class PostLikeController extends Controller
{
    //

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function store(Post $post, Request $request)
    {

        if($post->likedByUserAuth($request->user()))
        {
            return response(null, 409);
        }

        $post->likes()->create([

            'user_id' =>$request->user()->id

        ]);

        if(! $post->likes()->onlyTrashed()->where('user_id', $request->user()->id)->count())
        {
            Mail::to($post->user)->send(new PostLiked($request->user(), $post));

        }


        return back();

    }

    public function destroy(Post $post, Request $request)
    {
        $request->user()->likes()->where('post_id', $post->id)->delete();

        return back();
    }
}


    /*
  WHAT HAPPENNED IN LIKES
  WE HAVE 3 CLASSES/TABLES
  -Post =>
  -Likes => containes user_id and post_id, if there is a user_id, it means that the post is liked
  -User =>
  --we can create  elements in the likes table by simply doing $post->likes()->create([ and then pass the user_id by doing $request->user()->id])

  --The function likedByUserAuth is a function which takes User object in argument, and helps to verify is the authenticated user had liked or not the post ,

  It's done just by accessing in likes table in The Post Modal, with $this->likes->contains('user_id', $user->id):: collection , verigy a content table

    */
