<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login(Request $request){
        $formField = $request->only(['email', 'password']);

        if (Auth::attempt($formField)){
            return redirect()->to(route('index'));
        }else{
            return redirect()->to(route('login-error'));
        }
    }
}
