@extends('layouts.app')

@section('content')
    <h1> Create a new Event Type</h1>

    <div class="container">

        <form action="{{ route('eventype.store') }}" method="POST" enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" name="name" id="name" class="form-control">
            </div>

            <button type="submit" class="btn btn-primary mt-4">Create</button>

        </form>
    </div>



@endsection
