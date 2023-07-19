@extends('components.master')
@section('title','Orders')

@section('content')

<div class="container my-5">
    <div class="card shadow mt-3">
        <div class="card-title m-3 border-bottom border-2">
            <h4 class="fw-bold">New Orders
                <a href="{{url('order-history')}}" class="btn btn-primary float-end mb-3">Order History</a>
            </h4>
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
                            <td>{{$item->tracking_no}}</td>
                            <td>${{ $total_price }}</td>
                            <td>${{$discount}}</td>
                            <td>${{$taxes}}</td>
                            <td>${{$item->total_price}}</td>
                            <td>{{$item->fname}}</td>
                            <td>{{$item->phone}}</td>
                            <td>{{$item->zipcode}}</td>
                            <td>{{$item->status == '0' ?"pending" : 'completed'}}</td>
                            <td>{{date('d-m-Y' , strtotime($item->created_at))}}</td>
                            <td><a href="{{url('admin/show-orders/'.$item->id)}}"><button class="btn btn-primary">Show order</button></td></a>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>



@endsection