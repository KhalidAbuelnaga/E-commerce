@extends('components.master')
@section('title','My Orders')

@section('content')

<div class="container my-5">
    <div class="links mb-3 py-3">
            <h6 class="mb-0">
                <a href="{{url("/")}}">Home</a> / 
                <a href="{{url("my-orders")}}">My orders</a>
            </h6>
        </div>
    <div class="card shadow mt-3">
        <div class="card-title m-3 border-bottom border-2">
            <h4 class="fw-bold">My Orders</h4>
        </div>
        <div class="card-body table-responsive-lg">
            <table class="table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Subtotal</th>
                        <th>Discount</th>
                        <th>Tax</th>
                        <th>Total</th>
                        <th>Name</th>
                        <th>Phone</th>
                        <th>Zip Code</th>
                        <th>Status</th>
                        <th>Order Date</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($orders as $item)
                    @php
                    $taxes = $item->total_price *0.01;
                    $discount = $item->total_price * 0.005;
                    $total_price = $item->total_price + $taxes - $discount;
                    @endphp
                        <tr>
                            <td>1</td>
                            <td>${{ $total_price }}</td>
                            <td>${{$discount}}</td>
                            <td>${{$taxes}}</td>
                            <td>${{$item->total_price}}</td>
                            <td>{{$item->fname}}</td>
                            <td>{{$item->phone}}</td>
                            <td>{{$item->zipcode}}</td>
                            <td>{{$item->status == '0' ?"pending" : 'completed'}}</td>
                            <td>{{date('d-m-Y' , strtotime($item->created_at))}}</td>
                            <td><a href="{{url('show-order/'.$item->id)}}"><button class="btn btn-primary">Show order</button></td></a>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>



@endsection