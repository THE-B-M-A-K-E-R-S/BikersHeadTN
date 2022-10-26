@extends('layouts.app')

@section('content')
    <div class="container mt-2">
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h2>Trotinettes :)</h2>
                </div>
                <div class="pull-right mb-2">
                    <a class="btn btn-success" href="{{ route('trotinettes.create') }}"> Add a new Trotinette</a>
                    
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
                    <th>Model</th>
                    <th>Type</th>
                    <th>Speed</th>
                    <th>Weight</th>
                    <th>Color</th>
                    <th>Price</th>
                    <th>Rent Price</th>
                    <th>Quantity</th>
                    <th width="280px">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($trotinettes as $trotinette)
                    <tr>
                        <td>{{ $trotinette->id }}</td>
                        <td>{{ $trotinette->nom }}</td>
                        <td>{{ $trotinette->categorie }}</td>
                        <td>{{ $trotinette->vitesse }}</td>
                        <td>{{ $trotinette->poids }}</td>
                        <td>{{ $trotinette->couleur }}</td>
                        <td>{{ $trotinette->prix }}</td>
                        <td>{{ $trotinette->prix_location }}</td>
                        <td>{{ $trotinette->quantite }}</td>
                        <td>
                            <form action="{{ route('trotinettes.destroy',$trotinette->id) }}" method="Post">
                                <a class="btn btn-primary" href="{{ route('trotinettes.edit',$trotinette->id) }}">Edit</a>
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
            </tbody>
        </table>
        {!! $trotinettes->links() !!}
    </div>
    @endsection