@extends('layouts.app')

@section('content')
<h1> Create a new Event</h1>

<div class="container">

    <form action="{{ route('event.store') }}" method="POST" enctype="multipart/form-data">
        {{ csrf_field() }}
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
            <label for="date">Date</label>
            <input type="date" name="date" id="date" class="form-control">
        </div>
        <div class="form-group">
            <label for="image[]">Choose Images</label>
            <input type="file" name="image[]" multiple class="form-control">
        </div>
        <div class="form-group">
            <label for="event_type_id">eventType</label>
            <select class="form-select" name="event_type_id" id="event_type_id" style="color: #41A7A5" class="form-control form-control-lg">
                @foreach ($eventTypes as $eventType)
                    <option value="{{$eventType->id}}">{{$eventType->name}}</option>
                @endforeach
            </select>        </div>

        <button type="submit" class="btn btn-primary mt-4">Create</button>

    </form>
</div>



@endsection
