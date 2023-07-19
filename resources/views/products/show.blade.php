@extends('components.master')
@section('title')
    {{ $product->name}}
@endsection

@section('content')
    <div class="container my-5">
        <div class="row">
            <div class="col-md-3 pe-md-4">
                <div class="card border-0 px-0 product_data">
                    <div class="image position-relative">
                        <img src="{{ asset("$product->image")}}" class="card-img-top rounded-0 w-100" alt="...">
                        <p class="card-text bg-dark text-light price p-1">${{ $product->original_price}}</p>
                    </div>
                    <div class="card-body px-0">
                        <div class="card-text rate d-block">
                        <input type="radio" id="star5" name="rate" value="5" />
                        <label for="star5" title="text">5 stars</label>
                        <input type="radio" id="star4" name="rate" value="4" />
                        <label for="star4" title="text">4 stars</label>
                        <input type="radio" id="star3" name="rate" value="3" />
                        <label for="star3" title="text">3 stars</label>
                        <input type="radio" id="star2" name="rate" value="2" />
                        <label for="star2" title="text">2 stars</label>
                        <input type="radio" id="star1" name="rate" value="1" />
                        <label for="star1" title="text">1 star</label>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 w-75 product_data">
            <div class="title">
                <h1>{{ $product->name }}</h1>
            </div>
            <div class="show-price mt-4">
                <h4><span class="text-muted opacity-50">$</span>{{ $product->original_price}}</h4>
            </div>
            <div class="desc">
                <p>{{ $product->desc}} Lorem ipsum dolor sit amet consectetur adipisicing elit. Natus culpa tempore fugiat recusandae, atque quasi delectus mollitia doloribus odit possimus sint maxime officia. Consectetur sint quis, autem a iste quos delectus eius aliquid culpa perspiciatis tenetur nesciunt? Consequuntur inventore, voluptatem quasi libero sapiente laborum, iste maiores alias repudiandae esse nihil ullam. Libero inventore debitis repellat asperiores fugiat illo, officiis vitae.</p>
            </div>
            <div class="stock">
                @if ($product->quantity > 0 )
                    <p class=" text-success">In Stock</p>
                @else
                    <p class="text-danger">Out Of Stock</p>
                @endif
            </div>
            <div class="quantity py-4">
                <span class=" border border-2 rounded-2">Quantity</span>
                <input type="hidden" value="1" class="qty_input">
                <input type="hidden" value="{{$product->id}}" class="prod_id">
            </div>
            <div class="addCart d-flex align-items-center mt-3">
                @if ($product->quantity > 0)
                <button class="bg-mainColor btn me-2">
                    <a href="{{url('/cart')}}" class="btn text-white addToCart">Add to cart <i class="fa-solid fa-cart-plus"></i></a>
                </button>
                @endif
                <button type="button" class="text-muted border rounded-circle border-2 p-2 opacity-50 addToWishlist"><i class="fa-solid fa-heart"></i></button>
            </div>
        </div>
    </div>
    </div>


@endsection