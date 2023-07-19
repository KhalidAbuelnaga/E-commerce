@extends('components.master')

@section('title', 'Checkout page')

@section('content')
<div class="container my-5">
    <div class="row">
        <div class="col-md-7">
        <form action="{{url('place-order')}}" method="POST" class="checkout-form">
            @csrf
            <div class="card">
                <div class="card-title m-3">
                    <h5 class="fw-bold">Your information</h5>
                </div>
                <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <label for="">First Name</label>
                                <input type="text" class="form-control" name="fname" placeholder="Enter First Name" value="{{Auth::user()->name}}">
                            </div>
                            <div class="col-md-6">
                                <label for="">Last Name</label>
                                <input type="text" class="form-control" name="lname" placeholder="Enter Last Name" value="{{Auth::user()->lname}}">
                            </div>
                            <div class="col-md-6 mt-5">
                                <label for="">Email</label>
                                <input type="email" class="form-control" name="email" placeholder="Enter your Email" value="{{Auth::user()->email}}">
                            </div>
                            <div class="col-md-6 mt-5">
                                <label for="">Phone Number</label>
                                <input type="text" class="form-control" name="phone" placeholder="Enter phone Number" value="{{Auth::user()->phone}}">
                            </div>
                            <div class="col-md-6 mt-5">
                                <label for="">Address 1</label>
                                <input type="text" class="form-control" name="address1" placeholder="Enter your Address" value="{{Auth::user()->address1}}">
                            </div>
                            <div class="col-md-6 mt-5">
                                <label for="">Address 2</label>
                                <input type="text" class="form-control" name="address2" placeholder="Enter your Address" value="{{Auth::user()->address2}}">
                            </div>
                            <div class="col-md-6 mt-5">
                                <label for="">Country</label>
                                <input type="text" class="form-control" name="country" placeholder="Country" value="{{Auth::user()->country}}">
                            </div>
                            <div class="col-md-6 mt-5">
                                <label for="">City</label>
                                <input type="text" class="form-control" name="city" placeholder="City" value="{{Auth::user()->city}}">
                            </div>
                            <div class="col-md-6 mt-5">
                                <label for="">State</label>
                                <input type="text" class="form-control" name="state" placeholder="State" value="{{Auth::user()->state}}">
                            </div>
                            <div class="col-md-6 mt-5">
                                <label for="">Zip</label>
                                <input type="text" class="form-control" name="zip" placeholder="Zip" value="{{Auth::user()->zipcode}}">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-5">
                <div class="card">
                    <div class="card-title m-3">
                        <h5 class="fw-bold">Order Details</h5>
                    </div>
                <div class="card-body">
                    <table class="table table-bordered border-1">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Qty</th>
                                <th>Price</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($cartitems as $item)
                            <tr>
                                <td>{{$item->products->name}}</td>
                                <td>{{$item->product_quantity}}</</td>
                                <td>{{$item->products->original_price}}</</td>
                                </tr>
                                @endforeach
                        </tbody>
                    </table>
                    <button class="btn btn-primary" type="submit">Place order</button>
                </div>
            </div>
        </form>
        </div>
    </div>
</div>


@endsection