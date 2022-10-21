@extends('layouts.app')

@section('content')
<h1> Create a new Event</h1>

<div class="container">

    <form action="{{ route('event.store') }}" method="POST" enctype="multipart/form-data">
        {{ csrf_field() }}
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" name="name" id="name" class="form-control">
        </div>
        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" name="title" id="title" class="form-control">
        </div>
        <div class="form-group">
            <label for="description">Description</label>
            <input type="text" name="description" id="description" class="form-control">
        </div>
        <div class="form-group">
            <label for="location">Location</label>
            <input type="text" name="location" id="location" class="form-control">
        </div>
        <div class="form-group">
            <label for="eventType">eventType</label>
            <input type="text" name="eventType" id="eventType" class="form-control">
        </div>

        <button type="submit" class="btn btn-primary mt-4">Create</button>

    </form>
</div>



@endsection
