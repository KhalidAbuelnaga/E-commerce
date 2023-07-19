@extends('components.master')

@section('title')
    edit {{ $product->name }}
@endsection

@section('content')
    <section class="my-5 container">
        <h2 class="text-danger text-center my-4">edit {{ $product->name }}</h2> 
        <form method="POST" action="{{ url("products/update" )}}" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label class="form-label">Product Name</label>
                <input type="text" name="name" class="form-control" value="{{ $product->name }}">
            </div>
            <div class="mb-3">
                <label class="form-label">Product Description</label>
                <textarea type="text" name="desc" class="form-control" value="{{ $product->desc }}"></textarea>
            </div>
            <div class="mb-3">
                <label class="form-label">Categories</label>
                <select name="category_id" class="form-select" aria-label="Default select example" value=" {{$product->category->name}}">
                    <option selected>Open this menu</option>
                    @foreach ($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="formFile" class="form-label">upload file</label>
                <input type="file" class="form-control" type="file" name="image" value="{{ $product->image }}">
            </div>
            <div class="input-group mb-3">
                <span class="input-group-text">$</span>
                <input type="text" name="original_price" class="form-control" aria-label="Amount (to the nearest dollar)" value="{{ $product->original_price }}">
            </div>
            <div class="mb-3">
                <label class="form-label">Product Quantity</label>
                <input type="text" name="quantity" class="form-control">
            </div>
            <button type="submit" class="btn btn-danger">edit Product</button>
        </form>
    </section>
@endsection