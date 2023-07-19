<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//use Symfony\Component\HttpKernel\Profiler\Profile;
use App\Models\Profile;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    //
    public function profile(){
        return view("profile");
    }
    public function editprofile(Request $request){
        $data = $request->all();
        $user = Profile::saved($data);
        return view('home');
    }
}
