<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Jobs\RegistrationJob;
use Illuminate\Http\Request;
use App\Models\Users;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function store(Request $request){
        
        $hobby = $request->hobbies;
        $hobby = implode(',',$hobby);
        $request['hobbies'] = $hobby;
        $password = $request->password;
        $password = Hash::make($password);
        $request['password'] = $password;
        $user = Users::create($request->except('_token'));

        dispatch(new RegistrationJob($user));

        return Redirect('/login');
    }
}
