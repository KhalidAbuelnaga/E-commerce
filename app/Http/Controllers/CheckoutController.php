<?php

namespace App\Http\Controllers;

use App\Models\Carts;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckoutController extends Controller
{
    public function index(){
        $oldcartitems = Carts::where('user_id' , Auth::id())->get();
        foreach ($oldcartitems as $items) {
            if(!Product::where('id' , $items->product_id)->where('quantity' , '>=' , $items->product_quantity)->exists()){
                $removeitems = Carts::where('user_id',Auth::id())->where('product_id' , $items->product_id)->first();
                $removeitems->delete();
            }
        };

        $cartitems = Carts::where('user_id' , Auth::id())->get();
        return view('checkout' , ['cartitems'=>$cartitems]);
    }
    public function placeorder(Request $request){
        $order = new Order();
        $order->user_id = Auth::id();
        $order->fname = $request->input('fname');
        $order->lname = $request->input('lname');
        $order->email = $request->input('email');
        $order->phone = $request->input('phone');
        $order->address1 = $request->input('address1');
        $order->address2 = $request->input('address2');
        $order->country = $request->input('country');
        $order->city = $request->input('city');
        $order->state = $request->input('state');
        $order->zipcode = $request->input('zip');
        $total = 0;
        $cartitems_total = Carts::where('user_id' , Auth::id())->get();
        foreach ($cartitems_total as $prod) {
            $total += $prod->products->original_price * $prod->product_quantity;
        }
        $order->total_price =$total ;

        $order->tracking_no = rand(111,99999);
        $order->save();
        $cartitems = Carts::where('user_id' , Auth::id())->get();

        foreach($cartitems as $item){
            OrderItem::create([
                'order_id'=> $order->id , 
                'product_id' => $item->product_id,
                'quantity'=> $item->product_quantity,
                'price' => $item->products->original_price
            ]);

            $prod = Product::where('id', $item->product_id)->first();
            $prod->quantity = $prod->quantity - $item->product_quantity;
            $prod->update();
        }
        if(Auth::user()->address1 == NULL){
            $user = User::where('id' , Auth::id())->first();
            $user->name = $request->input('fname');
            $user->lname = $request->input('lname');
            $user->phone = $request->input('phone');
            $user->address1 = $request->input('address1');
            $user->address2 = $request->input('address2');
            $user->country = $request->input('country');
            $user->city = $request->input('city');
            $user->state = $request->input('state');
            $user->zipcode = $request->input('zip');
            $user->update();
        }
        Carts::destroy($cartitems);
        return redirect("/");
    }
}
