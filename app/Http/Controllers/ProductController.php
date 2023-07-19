<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(){
        $products = Product::all();
        $categories = Category::get();
        $latestProducts = Product::latest("id")->paginate(12);
        return view('products.index' , [
            "products"=>$products ,
            "latestProducts"=>$latestProducts ,
            "categories"=>$categories
        ]);
    }
    function create(){
        $categories = Category::get();
        return view("products.create" , ["categories"=>$categories]);
    }
    function store(Request $request){
        $data = $request->all();
        if ($request->hasFile("image")) {
            $image = $request->file("image");
            $imageName = time() . "_" . uniqid() . "_product." .$image->getClientOriginalExtension();
            $destination = public_path("uploads/");
            $image->move($destination , $imageName);
            $data['image'] = "uploads/".$imageName;
        } else {
            $data['image'] = "default/product.png";
            return "file doesn't exist";
        }
        
        $product = Product::create($data);
        return $product ? redirect("products") : redirect()->back();
    }

    function edit(Product $product){
        $categories = Category::get();
        $product->update();
        return view("products.edit" , ["product" => $product] , ["categories"=>$categories]);
    }

    function update(Product $product){
        $product->update();
        return $product ? redirect("products") : redirect()->back();
    }

    function show(Product $product){
        return view("products.show" , ["product"=>$product]);
    }

    function destroy(Product $product){
        $product->delete();
        return redirect("/products");
    }
}
