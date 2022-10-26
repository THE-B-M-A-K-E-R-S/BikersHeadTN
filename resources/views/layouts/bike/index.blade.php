@extends('layouts.app')


{{-- <h1>All Bikes</h1>


<table aria-describedby="table of all bikes">
    <thead>
        <tr>
            <th>Id</th>
            <th>Name</th>
            <th>price</th>
            <th>Color</th>
            <th>Brand</th>
            <th>Model</th>
            <th>Description</th>
            <th>Type</th>
            <th>size</th>
            <th>Actions</th>
        </tr>
    </thead>

    <tbody>
        @foreach($bikes as $bike)
        <tr>
            <td>{{ $bike->id }}</td>
            <td>{{ $bike->name }}</td>
            <td>{{ $bike->price }}</td>
            <td>{{ $bike->color }}</td>
            <td>{{ $bike->brand }}</td>
            <td>{{ $bike->model }}</td>
            <td>{{ $bike->description }}</td>
            <td> {{ $bike->type }}</td>
            <td> {{ $bike->size }}</td>
            <td>
                <a href="{{ route('bike.show', $bike->id) }}">Show</a>
                <a href="{{ route('bike.edit', $bike->id) }}">Edit</a>
                <form action="{{ route('bike.destroy', $bike->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach

    </tbody>



</table>
--}}

@section('content')

@if (session('status'))
<div class="alert alert-success" role="alert">
    {{ session('status') }}

</div>
@endif

<div class="row">
    <div class="col-md-12">
        <a href="{{ route('bike.create') }}" class="btn btn-primary">Add Bike</a>
    </div>

</div>
<div class="container">


    <div class="row">

        <div class="col-md-12">
            <div class="card">

                @foreach($bikes as $bike)



                {{-- @foreach ($images as $image)
                @if ($bike->id == $image->bike_id)

                <img src="{{ url('/uploads/bike/'.$image->image) }}" alt="bike image" height="200" width="300"
                    class="d-block w-100">
                @endif
                @endforeach --}}


                <div class="col-md-4">

                    <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">

                        <div class="carousel-inner ">
                            @foreach($images as $image)

                            <div class="carousel-item @if($loop->first) active @endif">
                                @if ($image->bike_id == $bike->id )


                                <img src="{{ url('/uploads/bike/'.$image->image) }}"
                                    class="d-inline-block border text-center rounded" alt="{{ $image->image }}"
                                    width="400">

                                @endif
                            </div>



                            @endforeach
                        </div>
                        <a class="carousel-control-prev" href="#carouselExampleControls" role="button"
                            data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#carouselExampleControls" role="button"
                            data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>
                    </div>

                    <div class="card mb-4 shadow-sm">

                        <div class="card-body">
                            <p class="card-text">{{ $bike->name }}</p>
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="btn-group">
                                    <a href="{{ route('bike.show', $bike->id) }}"
                                        class="btn btn-sm btn-outline-secondary">View</a>
                                    <a href="{{ route('bike.edit', $bike->id) }}"
                                        class="btn btn-sm btn-outline-secondary">Edit</a>
                                </div>
                                <small class="text-muted">{{ $bike->price }}</small>
                            </div>
                        </div>
                    </div>

                </div>

                @endforeach



            </div>
        </div>
    </div>
</div>





@endsection




{{-- @foreach($bikes as $bike)
@foreach ($images as $image)

<div class="col-md-4">
    @if ($bike->id == $image->bike_id)
    <img src="{{ url('/uploads/bike/'.$image->image) }}" alt="bike image" height="200" width="300">
    @endif


    <div class="card mb-4 shadow-sm">

        <div class="card-body">
            <p class="card-text">{{ $bike->name }}</p>
            <div class="d-flex justify-content-between align-items-center">
                <div class="btn-group">
                    <a href="{{ route('bike.show', $bike->id) }}" class="btn btn-sm btn-outline-secondary">View</a>
                    <a href="{{ route('bike.edit', $bike->id) }}" class="btn btn-sm btn-outline-secondary">Edit</a>
                </div>
                <small class="text-muted">{{ $bike->price }}</small>
            </div>
        </div>
    </div>
    @endforeach
</div>

@endforeach --}}