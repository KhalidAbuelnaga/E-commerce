@extends('components.master')
@section('title','Cart')

@section('content')

<section class="Cart">

    <div class="container my-5">
        <div class="links mb-3 py-3">
            <h6 class="mb-0">
                <a href="{{url("/")}}">Home</a> / 
                <a href="{{url("cart")}}">Cart</a>
            </h6>
        </div>
        <div class="row">
            <div class="col-md-9">
                <div class="card shadow">
                    <div class="card-title border-bottom border-2">
                    <h4 class="m-3">Cart-items</h4>
                </div>
                @php
                    $total = 0;
                @endphp
                @foreach ($carts as $items) 
                <div class="card-body pb-0 product_data">
                    <div class="row border-bottom border-2 pb-3">
                        <div class="col-md-3 my-auto">
                <img src="{{asset($items->products->image)}}" alt="Image here" class="w-100">
            </div>
            <div class="col-md-4 ">
                <h4 class="mb-5 fw-bold">{{ $items->products->name }}</h4>
                @if ($items->products->quantity > 0 )
                <h6 class=" text-success my-4">In Stock</h6>
                @else
                <h6 class="text-danger">Out Of Stock</h6>
                @endif
                <div class="remaining mb-5">
                    <h6 class="text-muted pb-4">Remaining: {{$items->products->quantity}}</h6>
                </div>
                <a href="{{ url("cart/destroy" , $items->id )}}">
                    <button class="btn btn-primary mt-3"><i class="fa fa-trash"></i></button>
                </a>
            </div>
            <div class="col-md-5">
                <div class="w-75 ms-auto">
                    <input type="hidden" class="prod_id" value="{{$items->product_id}}">
                    @if ($items->products->quantity >= $items->product_quantity)
                    <div class="input-group text-center" >
                        <button class=" border-0 decrement-btn changeQuantity bg-primary text-white me-2 rounded">-</button>
                        <div class="full-input form-control d-inline-block p-1 border border-2 rounded">
                            <label for= "qty" class="d-block text-muted float-start">Quantity</label>
                            <input type="text" name="quantity" id="qty" class="form-control qty_input rounded d-block border-0" value="{{$items->product_quantity}}">
                        </div>
                        <button class="border-0 increment-btn changeQuantity bg-primary text-white ms-2 rounded">+</button>
                    </div>
                    @php
                        $total_product =  $items->products->original_price * $items->product_quantity;
                        $total += $items->products->original_price * $items->product_quantity;
                    @endphp
                    @endif
                    <h5 class="mt-4 text-center fw-bolder">Price: ${{ $items->products->original_price}}</h5>
                    <h5 class="mt-4 text-center fw-bolder">Total: ${{$total_product}}</h5>
                </div>
                
            </div>
        </div>
    </div>
        @endforeach
    </div>
    <div class="card shadow mt-3">
        <div class="card-title m-3">
            <h6 class="fw-bold">Expected shipping delivery</h6>
        </div>
        <div class="card-body">
            <p>timestamps</p>
        </div>
    </div>
        <div class="card shadow mt-3">
        <div class="card-title m-3">
            <h6 class="fw-bold">We accept</h6>
            <div class="d-flex align-items-center">
                <i class="fa-brands fa-cc-visa fs-1 me-3"></i>
                <i class="fa-brands fa-cc-mastercard fs-1 me-3"></i>
                <!-- PayPal Logo --><table border="0" cellspacing="0"><tr><td align="center"></td></tr><tr><td align="center"><a href="https://www.paypal.com/eg/webapps/mpp/paypal-popup" title="How PayPal Works" onclick="javascript:window.open('https://www.paypal.com/eg/webapps/mpp/paypal-popup','WIPaypal','toolbar=no, location=no, directories=no, status=no, menubar=no, scrollbars=yes, resizable=yes, width=1060, height=700'); return false;"><img src="https://www.paypalobjects.com/webstatic/mktg/Logo/pp-logo-100px.png" border="0" alt="PayPal Logo"></a></td></tr></table><!-- PayPal Logo -->
            </div>
        </div>
        <div class="card-body">
            
        </div>
    </div>
    </div>
    <div class="col-md-3 mt-3">
        @php
            $taxes = $total *0.01;
            $total_price = $total + $taxes;
        @endphp

        <div class="card shadow summary">
            <div class="card-title border-bottom border-2">
                <h5 class="fw-bold m-3">Summary</h5>
            </div>
            <div class="card-body border-bottom border-2">
                <div class="products d-flex justify-content-between opacity-75 fw-bold">
                    <span>Products</span>
                    <span class="me-3">${{$total}}</span>
                </div>
                <div class="products d-flex justify-content-between opacity-75 mt-3 border-bottom border-2 pb-3 fw-bold">
                    <span>Tax</span>
                    <span class="me-3 Tax-price">${{$taxes}}</span>
                </div>
                <div class="products d-flex justify-content-between mt-3 fw-bold align-items-center">
                    <span>Total amount <br>(including VAT)</span>
                    <span class="me-3">${{$total_price}}</span>
                </div>
                <a href="{{url('/checkout')}}"><button class="btn btn-primary mt-4">Go to checkout</button></a>
            </div>
        </div>
    </div>
</div>

</section>
@endsection