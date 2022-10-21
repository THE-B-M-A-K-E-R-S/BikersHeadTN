@extends('layouts.app')

@section('content')
    <div class="container mt-2">
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h2>Type Of Trotinettes</h2>
                </div>
                <div class="pull-right mb-2">
                    <a class="btn btn-success" href="{{ route('categoriets.create') }}"> Create A New Type</a>
                </div>
            </div>
        </div>
        @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
        @endif
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Types Of Trotinette</th>
                    <th width="280px">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($categoriets as $categoriet)
                    <tr>
                        <td>{{ $categoriet->id }}</td>
                        <td>{{ $categoriet->type }}</td>
                        <td>
                            <form action="{{ route('categoriets.destroy',$categoriet->id) }}" method="Post">
                                <a class="btn btn-primary" href="{{ route('categoriets.edit',$categoriet->id) }}">Edit</a>
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
            </tbody>
        </table>
        {!! $categoriets->links() !!}
    </div>
    @endsection