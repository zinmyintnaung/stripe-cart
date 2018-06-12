<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Auth;

class UserController extends Controller
{
    public function getSignup()
    {
        return view('user.signup');
    }

    public function postSignup(Request $request)
    {
        $this->validate($request, [
            'email' => 'email|required|unique:users',
            'password' => 'required|min:4'
        ]);

        $user = User::create([
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);
        $user->save();
        Auth::login($user);//Straight away login the user after signing up
        return redirect()->route('user.profile');
    }

    public function getSignin(){
        return view('user.signin');
    }

    public function postSignin(Request $request){
        $this->validate($request, [
            'email' => 'email|required',
            'password' => 'required|min:4'
        ]);
        if(Auth::attempt(['email'=>$request->email, 'password'=>$request->password])){
            return redirect()->route('user.profile');
        }
        return redirect()->back();
    }

    public function getProfile(){
        return view('user.profile');
    }
    
    public function getLogout(){
        Auth::logout(); 
        return redirect()->route('product.index');
    }
}
