@extends('components.master')
@section('title','Registered Users')

@section('content')
<div class="container my-5">
    <div class="card">
        <div class="card-title border-bottom border-2 m-3">
            <h3>Registered Users
                <a href="{{url("orders")}}" class="btn btn-primary float-end">Back</a>
            </h3>
        </div>
        <div class="card-body">
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th>Id</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $item)
                <tr>
                    <td>{{ $item->id}}</td>
                    <td>{{ $item->name.'  '.$item->lname}}</td>
                    <td>{{ $item->email }}</td>
                    <td>{{ $item->phone }}</td>
                    <td><a href="{{url('show-user/'.$item->id)}}"><button class="btn btn-primary">Show User</button></td></a>
                </tr>
    @endforeach
    </tbody>
</table>
</div>
</div>
</div>
@endsection
