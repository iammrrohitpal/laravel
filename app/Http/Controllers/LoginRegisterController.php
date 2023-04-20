<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\User;

class LoginRegisterController extends Controller
{
    public function index(Request $request){
        return view('login');
    }
    public function profile(Request $request){
        return view('profile');
    }
    public function dashboard(Request $request){
        return view('dashboard');
    }
    public function logout(Request $request){
        Auth::logout();
        return redirect('/');
    }
    public function signup(Request $request){
        $user = User::create(['username' => $request->username,'email' => $request->email,'password' => $request->password]);
        if(!empty($user)){
            Auth()->login($user);
            return redirect('dashboard')->with('message','User Login Successfully');
        }else{
            return redirect('login')->with('message','Enter valid Email and Password');
        }
    }
    public function signin(Request $request){
        $user = User::where('username', $request->username)->where('password', $request->password)->first();
        if(!empty($user)){
            Auth()->login($user);
            return redirect('dashboard')->with('message','User Login Successfully');
        }else{
            return redirect('login')->with('message','Enter valid Email and Password');
        }
    }
}
