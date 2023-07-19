<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login(){
        return view("Auth.login");
    }
    public function handleLogin(Request $request){
        $cred = Auth::attempt(['email' => $request->email, 'password' => $request->password]);
        return $cred  ? redirect("/") : redirect()->back();
    }
    public function logout(){
        Auth::logout();
        return redirect("/");
    }
}
