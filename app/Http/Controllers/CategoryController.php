<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Requests\CategoryRequest;

class CategoryController extends Controller
{
    //
    function index(){
        $categories = Category::all();
        return view('categories.index' , ["categories" => $categories]);
    }

    function show(Category $category){
        return view("categories.show" , ['category'=>$category]);
    }

    function destroy(Category $category){
        $category->delete();
        return redirect("/categories");
    }

    function create(){
        return view("categories.create");
    }

    function store(CategoryRequest $request){
        $data = $request->all();
        $category = Category::create($data);
        return redirect("categories");
    }

    function edit(Category $category){
        return view("categories.edit" , ["category" => $category]);
    }
}
