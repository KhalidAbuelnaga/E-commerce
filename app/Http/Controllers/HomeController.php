<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    //
    function get_home_page() {
        $categories = Category::get();
        $latestProducts = Product::latest("id" , "desc")->take(8)->get();
        $featuredAll = Product::where("type","featured items")->latest()->take(8)->get();
        $featuredMen = Product::where([
            ["type","featured items"] ,
            ["category_id" ,"13"]
            ])->latest()->take(8)->get();
        $featuredWomen = Product::where([
            ["type","featured items"] ,
            ["category_id" ,"14"]
            ])->latest()->take(8)->get();
        $featuredKids = Product::where([
            ["type","featured items"] ,
            ["category_id" ,"15"]
            ])->latest()->take(8)->get();
        $trending = Product::where("type","trending items")->latest()->take(8)->get();
        return view('home' , [
            'latestProducts'=>$latestProducts , 
            "featuredAll"=>$featuredAll ,
            "featuredMen"=>$featuredMen ,
            "featuredWomen"=>$featuredWomen , 
            "featuredKids"=>$featuredKids ,
            "categories"=>$categories , 
            "trending"=>$trending ,
        ]);
    }
}
