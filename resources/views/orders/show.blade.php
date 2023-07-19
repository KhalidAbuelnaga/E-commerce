@extends('components.master')
@section('title','Ordered Products')

@section('content')
<div class="container my-5">
    <div class="card">
        <div class="card-title border-bottom border-2 m-3">
            <h3>Show Orders
                <a href="{{url("my-orders")}}" class="btn btn-primary float-end">Back</a>
            </h3>
        </div>
        <div class="card-body">
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th>Name</th>
                    <th>Quantity</th>
                    <th>Price</th>
                    <th>Image</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($orders->orderitems as $item)
                <tr>
                    <td>{{ $item->products->name }}</td>
                    <td>{{ $item->quantity}}</td>
                    <td>{{ $item->price }}</td>
                    <td>
                        <img src="{{asset($item->products->image)}}" width="50px" alt="">
                    </td>
                </tr>
    @endforeach
    </tbody>
</table>
<h4>grand total : {{$orders->total_price}}</h4>
</div>
</div>

</div>
@endsection