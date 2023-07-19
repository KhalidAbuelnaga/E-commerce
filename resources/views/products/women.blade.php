@extends('components.master')
@section('title','Women products')

@section('content')
<section class="all-products">
    <div class="container mt-4 welcome p-0">
        <div class="links mb-3 py-3">
            <h6 class="mb-0">
                <a href="{{url("/")}}">Home</a> / 
                <a href="{{url("products")}}">All products</a> / 
                <a href="{{url("women")}}">Women</a>
            </h6>
        </div>
                <div class="title text-center my-5 position-relative">
            <h1>Women</h1>
        </div>
        <div class="row">
            <div class="list-group col-md-3 pe-md-5 rounded-0">
                <a class="list-group-item categories py-3">Categories</a>
                <a href="{{url("products")}}" class="list-group-item list-group-item-action py-3">All</a>
                @foreach ($categories as $category)
                    <a href="{{url($category->name)}}" class="list-group-item list-group-item-action py-3">{{$category->name}}</a>
                @endforeach
            </div>
            <div class="col-md-6 w-75 m-auto">
                <div class="row">
                    @foreach ($womenProducts as $product)
                    <div class="col-lg-3 pb-5 col-md-4 product_data">
                        <div class="card border-0  px-0">
                            <div class="image position-relative">
                                <img src="{{ asset("$product->image")}}" class="card-img-top rounded-0 w-100" alt="...">
                                <p class="card-text bg-dark text-light price p-1">${{ $product->original_price}}</p>
                                <div class="card-img-overlay text-center align-items-center justify-content-center d-flex">
                                    <a href="{{url("products" , $product->id)}}" class="btn btn-outline-light border-2 rounded-circle p-3 fw-medium"><i class="fa-regular fa-eye display-6"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="card-body px-0">
                            <h3 class="card-title">{{ $product->name }}</h3>
                            <input type="hidden" value="{{$product->id}}" class="prod_id">
                        <div class="card-text mt-4">
                            <button type="button" class="addToWishlist wishlist text-muted border rounded-circle border-2 p-2 opacity-50"><i class="fa-solid fa-heart"></i></button>
                            <button type="button" class="cart-icon text-muted border rounded-circle border-2 p-2 opacity-50"><i class="fa-solid fa-cart-plus"></i></button>
                            <button type="button"  class="share-icon text-muted border rounded-circle border-2 p-2 opacity-50"><i class="fa-sharp fa-solid fa-share-nodes"></i></button>
                        </div>
                        @if (Auth::user() && Auth::user()->role == "admin")
                            <div class="card-text d-block">
                                <a href="{{ url("products/destroy" , $product->id )}}" class="btn btn-danger">Delete</a>
                                <a href="{{ url("products/edit" , $product->id) }}" class="btn btn-info">edit</a>
                            </div>
                            @endif
                        </div>
                        </div>
                        @endforeach
                    </div>
                    <div class="pagination justify-content-center">
                        {{$womenProducts->links()}}
                    </div>
                </div>
                </div>
            </div>
</section>

@endsection