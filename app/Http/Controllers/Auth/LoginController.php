<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    //

    public function __construct()
    {

        $this->middleware('guest');

    }


    public function index(){

        return view('auth.login');
    }

    public function storeLog(Request $request){

      //  dd($request);

         $this->validate($request,[

            'email' => 'required|email',
            'password'=> 'required'

        ]);

       //login the user if his datas are corrects,

       if(!Auth::attempt($request->only(['email', 'password']), $request->remember)){

        return back()->with('status', 'Email or password is incorrect, please check and try again!');

       }

       return redirect()->route('dashboard')->with('success', 'Welcome member');

    }


    protected $maxAttempts = 3;
    protected $decayMinutes = 1;


}
