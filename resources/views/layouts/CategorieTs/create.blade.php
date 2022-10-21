@extends('layouts.app')

@section('content')
    <div class="container mt-2">
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left mb-2">
                    <h2>Add A Type of Trotinette</h2>
                </div>
                
            </div>
        </div>
        @if(session('status'))
        <div class="alert alert-success mb-1 mt-1">
            {{ session('status') }}
        </div>
        @endif
        <form action="{{ route('categoriets.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Type</strong>
                        <input type="text" name="type" class="form-control" placeholder="Type">
                        @error('type')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="pull-left" style="padding-top:10px">
                <button type="submit" class="btn btn-primary ml-3">Submit</button>
                </div>

                <div class="pull-right" style="padding-top:10px">
                    <a class="btn btn-primary" href="{{ route('categoriets.index') }}"> Back</a>
                </div>
            </div>
        </form>
    </div>
    @endsection