<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserPostController extends Controller
{
    //

    public function index(User $user)
    {
        $posts = $user->posts()->with(['user', 'likes'])->paginate(0);

        //dd($posts->count());

        return view('users.posts.index',compact('user', 'posts'));
    }
}
