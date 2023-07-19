@extends('components.master')
@section('title','Wishlist')

@section('content')

<section class="Wishlist">
    <div class="links mb-3 py-3">
            <h6 class="mb-0">
                <a href="{{url("/")}}">Home</a> / 
                <a href="{{url("wishlist")}}">Wishlist</a>
            </h6>
        </div>
    <div class="container my-5">
        <div class="card shadow">
            @if ($wishlist->count() > 0)
            @foreach ($wishlist as $items) 
            <div class="card-body">
        <div class="row align-items-center border-bottom border-2 pb-3">
            <div class="col-md-2 my-auto">
                <img src="{{asset($items->products->image)}}" alt="Image here" class="w-75">
            </div>
            <div class="col-md-2 my-auto">
                <h4>{{ $items->products->name }}</h4>
            </div>
            <div class="col-md-2 my-auto">
                <h5>${{ $items->products->original_price}}</h5>
            </div>
            <div class="col-md-2 my-auto">
                <input type="hidden" class="prod_id" value="{{$items->product_id}}">
                @if ($items->products->quantity > 0 )
                    <h5 class=" text-success">In Stock</h5>
                    @else
                    <h5 class="text-danger">Out Of Stock</h5>
                    @endif
                </div>
                <div class="col-md-2 my-auto">
                    <button class="btn bg-mainColor text-white"><i class="fa-solid fa-cart-plus"></i> Add To Cart</button>
                </div>
            <div class="col-md-2 my-auto">
                <a href="{{ url("wishlist/destroy" , $items->id )}}">
                    <button class="btn btn-danger"><i class="fa fa-trash"></i> Remove</button>
                </a>
            </div>
        </div>
    </div>
    @endforeach
</div>
</div>
@else
<h2>There are no products in your wishlist</h2>
            @endif

        </section>
            @endsection