<?php

namespace App\Http\Controllers\Admin;
use App\Http\Middleware\TrustHosts;
use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
//    function user(){
//        return view("users.adduser");
//    }
//    function store(Request $request){
//        $data = $request->all();
//        $data['password'] = Hash::make($request->password);
//        if ($request->hasFile("image")) {
//          $image = $request->file("image");
 //           $imageName = time() . "_" . uniqid() . "_user." .$image->getClientOriginalExtension();
 //           $destination = public_path("uploads/");
 //           $image->move($destination , $imageName);
 //           $data['image'] = "uploads/".$imageName;
//        } else {
//            $data['image'] = "default/user.png";
//        }
//        
 //       $user = User::create($data);
 //       return $user ? redirect("/") : redirect()->back();
//    }
        public function index(){
            $orders = Order::where('user_id' , Auth::id())->get();
            return view('orders.ordered' , ['orders' =>$orders]);
        }

        public function show($id){
            $orders = Order::where('id' , $id)->where('user_id' , Auth::id())->first();
            return view('orders.show' , ['orders'=>$orders]);
        }
}
