@extends('components.master')

@section('title')
    edit {{ $category->name }}
@endsection

@section('content')
    <section class="my-5 container">
        <h2 class="text-danger text-center my-4">edit {{ $category->name }}</h2> 
        <form action="{{ url("categories/store") }}" method="POST">
            @csrf
            <div class="mb-3">
                <label class="form-label">Category Name</label>
                <input type="text" name="name" value="{{ $category->name }}" class="form-control">
            </div>
            <button type="submit" class="btn btn-danger">edit Category</button>
        </form>
    </section>
@endsection