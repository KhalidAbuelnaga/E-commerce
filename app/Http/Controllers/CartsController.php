<?php

namespace App\Http\Controllers;

use App\Models\Carts;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartsController extends Controller
{
        public function index(){

        $cartlist = Carts::where('user_id' , Auth::id())->get();

        if (Auth::check()) {
            return view('/cart', ['carts'=>$cartlist ]);
        }


    }
    public function add(Request $request){
        $product_id = $request->input("product_id");
        $product_qty = $request->input("product_qty");

        if (Auth::check()) {

            $prod_check = Product::where('id',$product_id)->first();

            if($prod_check){
                if (Carts::where('product_id' , $product_id)->where('user_id',Auth::id())->exists()) {
                    return response()->json(["status" , "Product is already added to cart"]);
                } else {
                    
                    $cart = new Carts();
                    $cart->product_id = $product_id;
                    $cart->product_quantity = $product_qty;
                    $cart->user_id = Auth::id();
                    $cart->save();
                    return response()->json(["status" , "Product added to cart"]);
                }
                
            }else {
            return response()->json(["status" , "Product doesnt exist"]);
        }

        } else {
            return response()->json(["status" , "login to continue"]);
        }
        
    }

    public function updateCart(Request $request){
        $product_id = $request->input("product_id");
        $product_qty = $request->input("product_qty");

        if(Auth::check()){

            
            if (Carts::where('product_id' , $product_id)->where('user_id',Auth::id())->exists()){
                $cart = Carts::where('product_id' , $product_id)->where('user_id',Auth::id())->first();
                $cart->product_quantity = $product_qty;
                $cart->update();
                return response()->json(["status" , "Quantity updated"]);
            }else{
                return response()->json(["status" , "Quantity not updated"]);
            }
            
        }
    }
        function destroy(Carts $carts){
        $carts->delete();
        return redirect("/cart");
    }
}
