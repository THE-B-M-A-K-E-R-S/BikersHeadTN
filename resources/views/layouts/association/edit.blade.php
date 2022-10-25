@extends('layouts.app')

@section('content')
    <h1> Edit Association</h1>

    <div class="container">

        <form action="{{ route('association.update', $association->id) }}" method="POST" >
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" name="name" id="name" value="{{$association->name}}" class="form-control">
            </div>
            <div class="form-group">
                <label for="description">Description</label>
                <input type="text" name="description" id="description" value="{{$association->description}}" class="form-control">
            </div>
            <div class="form-group">
                <label for="address">Address</label>
                <input type="text" name="address" id="address" value="{{$association->address}}" class="form-control">
            </div>
            <div class="form-group">
                <label for="number">Number</label>
                <input type="text" name="number" id="number" value="{{$association->number}}" class="form-control">
            </div>
            <div class="form-group">
                <label for="pres_name">President Name</label>
                <input type="text" name="pres_name" id="pres_name" value="{{$association->pres_Name}}" class="form-control">
            </div>
            <div class="form-group">
                <label for="association_types_id">Association Type</label>
                <input type="text" name="association_types_id" id="association_types_id" value="{{$association->associationType->name}}" class="form-control">
            </div>

            <button type="submit" class="btn btn-primary mt-4">Update</button>

        </form>
    </div>



@endsection
