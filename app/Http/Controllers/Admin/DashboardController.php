<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function users(){
        $users = User::all();
        return view('Users.index' , ['users'=>$users]);
    }

    public function show($id){
        $users = User::find($id);
        return view('Users.show' , ['users'=>$users]);
    }
}
