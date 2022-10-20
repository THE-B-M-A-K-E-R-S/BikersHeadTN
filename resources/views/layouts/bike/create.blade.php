@extends('layouts.app')

@section('content')
<h1> Create a new Bike</h1>

<div class="container">

    <form action="{{ route('bike.store') }}" method="POST" enctype="multipart/form-data">
        {{ csrf_field() }}
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" name="name" id="name" class="form-control">
        </div>
        <div class="form-group">
            <label for="color">Color</label>
            <input type="text" name="color" id="color" class="form-control">
        </div>
        <div class="form-group">
            <label for="brand">Brand</label>
            <input type="text" name="brand" id="brand" class="form-control">
        </div>
        <div class="form-group">
            <label for="model">Model</label>
            <input type="text" name="model" id="model" class="form-control">
        </div>
        <div class="form-group">
            <label for="type">Type</label>
            <input type="text" name="type" id="type" class="form-control">
        </div>
        <div class="form-group">
            <label for="size">Size</label>
            <input type="text" name="size" id="size" class="form-control">
        </div>
        <div class="form-group">
            <label for="price">Price</label>
            <input type="text" name="price" id="price" class="form-control">
        </div>
        <div class="form-group">
            <label for="description">Description</label>
            <input type="text" name="description" id="description" class="form-control">
        </div>

        <div class="form-group">
            <label>Choose Images</label>
            <input type="file" name="image[]" multiple class="form-control">

        </div>

        <button type="submit" class="btn btn-primary mt-4">Create</button>


</div>



@endsection