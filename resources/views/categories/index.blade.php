@extends('components.master')
@section('title', 'Categories')

@section('content')
<div class="container">
    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Category Name</th>
                <th scope="col">Products</th>
                @if (Auth::user() && Auth::user()->role == "admin")
                    <th scope="col">Operation</th>
                @endif
            </tr>
        </thead>
        
        <tbody class="table-group-divider">
            @foreach ($categories as $category)
            <tr>
                <th scope="row">{{ $category->id }}</th>
                <td>{{ $category->name}}</td>
                <!--
                <td>
            @foreach ($category->products as $product)
            {{$product->name}} <br>
        @endforeach
        </td>-->
        @if (Auth::user() && Auth::user()->role == "admin")
        <td>
            <a class="btn btn-primary me-2" href="{{ url("categories", $category->id) }}">show</a>
            <a class="btn btn-info me-2" href="{{ url("categories/edit" , $category->id) }}">edit</a>
            <a class="btn btn-danger" href="{{ url("categories/destroy", $category->id) }}">delete</a>
        </td>
        @endif
    </tr>
@endforeach

</tbody>
</table>
</div>
@endsection