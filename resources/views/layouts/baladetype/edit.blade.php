@extends('layouts.app')

@section('content')


    <h1> Edit a BaladeType</h1>

    <form action="{{ route('baladetype.update', $baladeType->id) }}" method="POST">
        @csrf
        @method('PUT')

        <label for="name">Title</label>
        <input type="text" name="name" id="name" value="{{ $baladeType->name }}">
        <br>


        <button type="submit" class="btn btn-primary mt-4">Update</button>

    </form>

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
