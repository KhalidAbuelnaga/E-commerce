@extends('components.master')
@section('title', 'profile')

@section('content')
    <section class="my-5 container">
        <h2 class="text-danger text-center my-4">edit profile</h2> 
        <form method="POST" action="{{ url( "profile" )}}" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label class="form-label">Email</label>
                <input type="text" name="email" class="form-control" value="">
            </div>
            <div class="mb-3">
                <label class="form-label">Name</label>
                <input type="text" name="name" class="form-control"></input>
            </div>
            <div class="mb-3">
                <label class="form-label">Phone</label>
                <input type="text" name="phone" class="form-control"></input>
            </div>
            <div class="mb-3">
                <label class="form-label">address</label>
                <input type="text" name="address" class="form-control"></input>
            </div>
            <div class="mb-3">
                <label class="form-label">address 2</label>
                <input type="text" name="address2" class="form-control"></input>
            </div>
            <div class="mb-3">
                <label class="form-label">Country</label>
                <input type="text" name="country" class="form-control"></input>
            </div>
            <div class="mb-3">
                <label class="form-label">City</label>
                <input type="text" name="city" class="form-control"></input>
            </div>
            <div class="mb-3">
                <label class="form-label">State</label>
                <input type="text" name="state" class="form-control"></input>
            </div>
            <div class="mb-3">
                <label class="form-label">Zip</label>
                <input type="text" name="zip" class="form-control"></input>
            </div>
            <button type="submit" class="btn btn-danger">save</button>
        </form>
    </section>
@endsection