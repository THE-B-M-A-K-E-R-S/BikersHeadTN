@extends('layouts.app')

@section('content')
<h1> Create a new complaint</h1>

<div class="container">

    <form action="{{ route('reclamation.store') }}" method="POST" enctype="multipart/form-data">
        {{ csrf_field() }}
        <div class="form-group">
            <label for="description">Description</label>
            <input type="text" name="description" id="description" class="form-control">
        </div>
        <div class="form-group">
            <label for="date">Date</label>
            <input type="date" name="date" id="date" class="form-control">
        </div>
        <div class="form-group">
            <label for="reclamation_type_id">Complaint type</label>
            <select class="form-select" name="reclamation_type_id" id="reclamation_type_id" style="color: #41A7A5" class="form-control form-control-lg">
                @foreach ($reclamationTypes as $type)
                    <option value="{{$type->id}}">{{$type->label}}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="satisfaction_level">Satisfaction level</label>
            <select class="form-select" name="satisfaction_level" id="satisfaction_level" style="color: #41A7A5" class="form-control form-control-lg">
                    <option value="very low">Very Low</option>
                    <option value="low">Low</option>
                    <option value="medium">Medium</option>
                    <option value="high">High</option>
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
