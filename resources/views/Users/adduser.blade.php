@extends('components.master')
@section('title','Add User')

@section('content')
        <section class="my-5 container">
        <h2 class="text-danger text-center my-4">create new User</h2> 
        <form method="POST" action="{{ url("products/store" )}}" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label class="form-label">Name</label>
                <input type="text" name="name" class="form-control">
            </div>
            <div class="mb-3">
                <label class="form-label">Product Description</label>
                <textarea type="text" name="desc" class="form-control"></textarea>
            </div>
            <div class="mb-3">
                <label class="form-label">Categories</label>
                <select name="category_id" class="form-select" aria-label="Default select example">
                    <option selected>Open this menu</option>
                    @foreach ($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="formFile" class="form-label">upload file</label>
                <input type="file" class="form-control" type="file" name="image">
            </div>
            <button type="submit" class="btn btn-danger">Create Product</button>
        </form>
    </section>
@endsection