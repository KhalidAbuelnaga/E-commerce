@extends('components.master')
@section('title')
{{$category->name}} page
@endsection 


@section('content')
<div class="container">
    <div class="text-center">
        <h2>{{$category->name}}</h2>
        <p>{{$category->created_at}}</p>
        <p>{{$category->id}}</p>
    </div>
</div>
    
@endsection