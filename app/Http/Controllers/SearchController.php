<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function productlist(){
        $products = Product::select('name')->get();
        $data = [];
        foreach ($products as $item) {
            $data[] = $item['name'];
        }
        return $data;
    }
    public function searchProduct(Request $request){
        $searched_products = $request->search;

        if ($searched_products != "") {
            $product = Product::where('name' , "$searched_products");
            if ($product) {
                return redirect();
            }
        }
    }
    
}
