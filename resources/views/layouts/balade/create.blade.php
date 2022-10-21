@extends('layouts.app')

@section('content')
<h1> Create a new Balade</h1>

<div class="container">

    <form action="{{ route('balade.store') }}" method="POST" enctype="multipart/form-data">
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
            <label for="place">Place</label>
            <input type="text" name="place" id="place" class="form-control">
        </div>
        <div class="form-group">
            <label for="distance">Distance</label>
            <input type="number" name="distance" id="distance" class="form-control">
        </div>
        <div class="form-group">
            <label for="duration">Duration</label>
            <input type="number" name="duration" id="duration" class="form-control">
        </div>
        <div class="form-group">
            <label for="max_participants">max participants</label>
            <input type="number" name="max_participants" id="max_participants" class="form-control">
        </div>
        <div class="form-group">
            <label for="difficulty">Difficulty</label>
            <select id="difficulty" name="difficulty" class="form-control form-control-lg">
                <option value="HARD" selected>HARD</option>
                <option value="MEDIUM">MEDIUM</option>
                <option value="EASY">EASY</option>
            </select>
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
            <label for="balade_type_id">Type</label>
            <select class="form-select" name="balade_type_id" id="balade_type_id" style="color: #41A7A5" class="form-control form-control-lg">
                @foreach ($baladeTypes as $baladeType)
                    <option value="{{$baladeType->id}}">{{$baladeType->name}}</option>
                @endforeach
            </select>

        </div>

        <button type="submit" class="btn btn-primary mt-4">Create</button>

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
