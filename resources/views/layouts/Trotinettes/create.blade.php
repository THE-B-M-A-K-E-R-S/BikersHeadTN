@extends('layouts.app')

@section('content')
    <div class="container mt-2">
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left mb-2">
                    <h2>A New Trotinette</h2>
                </div>
               
            </div>
        </div>
        @if(session('status'))
        <div class="alert alert-success mb-1 mt-1">
            {{ session('status') }}
        </div>
        @endif
        <form action="{{ route('trotinettes.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Model:</strong>
                        <input type="text" name="nom" class="form-control" placeholder="Model">
                        @error('nom')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <!-- <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Categorie Trotinette:</strong>
                        <input type="text" name="categorie" class="form-control" placeholder="Categorie Trotinette">
                        @error('categorie')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div> -->
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Type:</strong>
                            <select name="categorie" id="categorie" class="form-control">
                                @foreach($categoriets as $key => $value)
                                <option value="{{ $value->id }}">{{ $value->type }}</option>
                                @endforeach
                            </select>
                    </div>
                </div>
            </div>
              
            
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Speed:</strong>
                        <input type="text" name="vitesse" class="form-control" placeholder="Speed">
                        @error('vitesse')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Weight:</strong>
                        <input type="text" name="poids" class="form-control" placeholder="Weight">
                        @error('poids')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Color:</strong>
                        <input type="text" name="couleur" class="form-control" placeholder="Color">
                        @error('couleur')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Price:</strong>
                        <input type="text" name="prix" class="form-control" placeholder="Price">
                        @error('prix')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                 <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Rent Price:</strong>
                        <input type="text" name="prix_location" class="form-control" placeholder="Rent Price">
                        @error('prix_location')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Quantity :</strong>
                        <input type="text" name="quantite" class="form-control" placeholder="Quantity">
                        @error('quantite')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="pull-left" style="padding-top:10px">
                    <button type="submit" class="btn btn-primary ml-3">Submit</button>
                </div>

                <div class="pull-right" style="padding-top:10px">
                    <a class="btn btn-primary" href="{{ route('trotinettes.index') }}" enctype="multipart/form-data">
                        Back</a>
                </div>
            </div>
        </form>
    </div>
    @endsection