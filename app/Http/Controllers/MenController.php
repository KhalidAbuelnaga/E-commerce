<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class MenController extends Controller
{
    public function index(){
        $products = Product::all();
        $categories = Category::get();
        $men = Product::where("category_id" , "13")->latest()->paginate(8);
        return view('products.men' , [
            "products"=>$products ,
            "menProducts"=>$men ,
            "categories"=>$categories
        ]);
    }
}
