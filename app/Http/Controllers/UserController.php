<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Auth;
use Session;

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
        
        if(Session::has('oldUrl')){ //the session has stored in Handler.php
            $oldUrl = Session::get('oldUrl');
            Session::forget('oldUrl');
            return redirect()->to($oldUrl);
        }

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
            if(Session::has('oldUrl')){ //the session has stored in Handler.php
                $oldUrl = Session::get('oldUrl');
                Session::forget('oldUrl');
                return redirect()->to($oldUrl);
            }
            return redirect()->route('user.profile');
        }
        return redirect()->back();
    }

    public function getProfile(){
        
        $orders = Auth::user()->orders; //using relationship to load all the orders that belongs to current user
        $orders->transform(function($order, $key){ //instead of using foreach to our collection
            $order->cart = unserialize($order->cart);
            return $order;
        });
        return view('user.profile')->with('orders', $orders);
    }
    
    public function getLogout(){
        Auth::logout(); 
        return redirect()->route('user.signin');
    }
}
