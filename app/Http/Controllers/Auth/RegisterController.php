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
            'password'=>'required|max:8|confirmed',
            'profil' => 'sometimes|image|max:5000',

        ]);


        /* Creating User */

      $user =  User::create([

            'name'=>$request->name,
            'username'=>$request->username,
            'email'=>$request->email,
            'password'=>Hash::make($request->password)
        ]);

        /*After cerate the user, we call the function storeImage in order to take and store the choosen image */

        $this->storeImage($user);

        /*  Authenticate the user and login him directly  */

        Auth::attempt($request->only(['email', 'password']));

        /*  Redirect the user to dashboard */

        return redirect()->route('dashboard');

    }

  public function storeImage(User $user)
  {

    if(request('profil'))
    {
        //dd(request('profil'));

        $user->update([
            'profil'=>request('profil')->store('avatars', 'public'),
        ]);
    }

  }

}
