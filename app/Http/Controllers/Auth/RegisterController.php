<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    //

    public function __construct()
    {
        $this->middleware('guest');
    }

    public function index(){

        return view('auth.register');

    }

    public function store(Request $request)
    {


        /*Validation quotes */
        $this->validate($request, [

            'name'=> 'required|max:250',
            'username'=>'required|max:50',
            'email'=>'required|email|unique:users,email',
            'password'=>'required|max:8|confirmed'

        ]);


        /* Creating User */

        User::create([

            'name'=>$request->name,
            'username'=>$request->username,
            'email'=>$request->email,
            'password'=>Hash::make($request->password)
        ]);

        /*  Authenticate the user and login him directly  */

        Auth::attempt($request->only(['email', 'password']));

        /*  Redirect the user to dashboard */

        return redirect()->route('dashboard');

    }

}
