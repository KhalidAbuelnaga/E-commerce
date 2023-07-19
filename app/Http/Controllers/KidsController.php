<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class KidsController extends Controller
{
    public function index(){
        $products = Product::all();
        $categories = Category::get();
        $kids = Product::where("category_id" , "15")->latest()->paginate(8);
        return view('products.kids' , [
            "products"=>$products ,
            "kidsProducts"=>$kids ,
            "categories"=>$categories
        ]);
    }
}
