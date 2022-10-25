@extends('layouts.app')

@section('content')
<h1> Create a new complaint type</h1>

<div class="container">

    <form action="{{ route('reclamationtype.store') }}" method="POST" enctype="multipart/form-data">
        {{ csrf_field() }}
        <div class="form-group">
            <label for="label">Label</label>
            <input type="text" name="label" id="label" class="form-control">
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
