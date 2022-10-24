@extends('layouts.app')

@section('content')
    <h1> Edit Association type</h1>

    <div class="container">

        <form action="{{ route('associationtype.update', $associationType->id) }}" method="POST" >
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" name="name" id="name" value="{{$associationType->name}}" class="form-control">
            </div>

            <button type="submit" class="btn btn-primary mt-4">Update</button>

        </form>
    </div>



@endsection
