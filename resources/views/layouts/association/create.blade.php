@extends('layouts.app')

@section('content')
    <h1> Create a new Association</h1>

    <div class="container">

        <form action="{{ route('association.store') }}" method="POST" enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" name="name" id="name" class="form-control">
            </div>
            <div class="form-group">
                <label for="description">Description</label>
                <input type="text" name="description" id="description" class="form-control">
            </div>
            <div class="form-group">
                <label for="address">Address</label>
                <input type="text" name="address" id="address" class="form-control">
            </div>
            <div class="form-group">
                <label for="number">Number</label>
                <input type="text" name="number" id="number" class="form-control">
            </div>
            <div class="form-group">
                <label for="pres_name">President Name</label>
                <input type="text" name="pres_name" id="pres_name" class="form-control">
            </div>
            <div class="form-group">
                <label for="association_types_id">Association Type</label>
                <input type="text" name="association_types_id" id="association_types_id" class="form-control">
            </div>

            <button type="submit" class="btn btn-primary mt-4">Create</button>

        </form>
    </div>



@endsection
