<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Wishlist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WishlistController extends Controller
{
    public function index(){
        $wishlist = Wishlist::where('user_id' , Auth::id())->get();
        return view('wishlist', ['wishlist'=>$wishlist ]);
    }
    public function add(Request $request){
        $product_id = $request->input("prod_id");
        if (Auth::check()) {
            if(Product::find($product_id)){
                $wish = new Wishlist();
                $wish->product_id = $product_id;
                $wish->user_id = Auth::id();
                $wish->save();
                return response()->json(["status" , "Product added to wishlist"]);
            }else {
            return response()->json(["status" , "Product doesnt exist"]);
        }

        } else {
            return response()->json(["status" , "login to continue"]);
        }
        
    }
    function destroy(Wishlist $wishlist){
        $wishlist->delete();
        return redirect("/wishlist");
    }
}