{{--<!DOCTYPE html>--}}
{{--<html lang="en">--}}

{{--<head>--}}
{{--    <meta charset="UTF-8">--}}
{{--    <meta name="viewport" content="width=device-width, initial-scale=1.0">--}}
{{--    <meta http-equiv="X-UA-Compatible" content="ie=edge">--}}
{{--    <title>Document</title>--}}
{{--</head>--}}

{{--<body>--}}


{{--    <h1> Edit a Bike</h1>--}}

{{--    <form action="{{ route('bike.update', $event->id) }}" method="POST">--}}
{{--        @csrf--}}
{{--        @method('PUT')--}}

{{--        <label for="title">Title</label>--}}
{{--        <input type="text" name="title" id="title" value="{{ $event->title }}">--}}
{{--        <br>--}}

{{--        <label>Description</label>--}}
{{--        <input type="text" name="description" id="description" value="{{$event->description}}">--}}

{{--        <br>--}}
{{--        <label for="model">Location</label>--}}
{{--        <input type="text" name="location" id="location" value="{{ $event->location }}">--}}
{{--        <br>--}}
{{--        <label for="type">Type</label>--}}
{{--        <input type="text" name="eventType" id="eventType" value="{{ $event->eventType }}">--}}
{{--        <br>--}}


{{--        <button type="submit">Update</button>--}}

{{--    </form>--}}



{{--</body>--}}

{{--</html>--}}


@extends('layouts.app')

@section('content')
    <h1> Update Event</h1>
    <div class="container">

        <form action="{{ route('event.update', $event->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" name="title" id="title" value="{{ $event->title }}" class="form-control">
            </div>
            <div class="form-group">
                <label for="description">Description</label>
                <input type="text" name="description" id="description"  value="{{ $event->description }}" class="form-control">
            </div>
            <div class="form-group">
                <label for="location">Location</label>
                <input type="text" name="location" id="location"  value="{{ $event->location }}" class="form-control">
            </div>
            <div class="form-group">
                <label for="date">Date</label>
                <input type="date" name="date" id="date" value="{{ $event->date }}" class="form-control">
            </div>
            <div class="form-group">
                <label for="image[]">Choose Images</label>
                <input type="file" name="image[]" multiple class="form-control">
            </div>
            <div class="form-group">
                <label for="event_type_id">eventType</label>
                <select class="form-select" @selected($event->eventType) name="event_type_id" id="event_type_id" style="color: #41A7A5" class="form-control form-control-lg">
                    @foreach ($eventTypes as $eventType)
                        <option value="{{$eventType->id}}">{{$eventType->name}}</option>
                    @endforeach
                </select>        </div>

            <button type="submit" class="btn btn-primary mt-4">Edit</button>

        </form>
    </div>

    @if(count($errors) > 0)
        <div class="p-1">
            @foreach($errors->all() as $error)
                <div class="alert alert-warning alert-danger fade show" role="alert">{{$error}} <button type="button" class="close"
                                                                                                        data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button></div>
            @endforeach
        </div>
    @endif



@endsection

