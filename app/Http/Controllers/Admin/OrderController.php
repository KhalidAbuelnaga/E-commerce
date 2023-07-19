<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index(){
        $orders = Order::where('status' , '0')->get();
        return view('orders.admin.index' , ['orders' => $orders]);
    }

    public function show($id){
        $orders = Order::where('id',$id)->first();
        return view('orders.admin.show' , ['orders'=>$orders]);
    }

    public function updateorder(Request $request , $id){
        $orders = Order::find($id);
        $orders->status = $request->input('order_status');
        $orders->update();
        return redirect('orders')->with('status' , 'order updated successfully');
    }

        public function orderhistory(){
        $orders = Order::where('status' , '1')->get();
        return view('orders.admin.history' , ['orders' => $orders]);
    }
}
