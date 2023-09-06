<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index(){
        return view('index');
    }
    public function authenticate(Request $request){
        if(Auth::attempt($request->only(['email','password']))){
            return redirect('/aviato/home');
        }else{
            return back()->withErrors(['Invalid Login']);
        }
    }
    public function logout(){
        Auth::logout();
        return redirect('/login');
    }
}