<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class WomenController extends Controller
{
    public function index(){
        $products = Product::all();
        $categories = Category::get();
        
        $women = Product::where("category_id" , "14")->latest()->paginate(8);
        return view('products.women' , [
            "products"=>$products ,
            "womenProducts"=>$women ,
            "categories"=>$categories ,
        ]);
    }
}
