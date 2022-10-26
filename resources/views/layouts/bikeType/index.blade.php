@extends('layouts.app')

@section('content')

<h1>All Bike Types</h1>
<div class="container-fluid col-12">
    <div class="col-lg-12 col-md-12 container-fluisd  d-flex flex-wrap">
        @foreach($bikeTypes as $bikeType)
        <div class="single-job-items mb-30 col-6">
            <div class="job-items m-5">
                <a href="{{ route('biketype.show', $bikeType->id) }}" style="text-align: center">
                    <h4>{{ $bikeType->name }}</h4>
                </a>
                <button type="button" class="button rounded-0 primary-bg w-100 btn_1 boxed-btn"><a
                        href="{{ route('biketype.edit', $bikeType->id) }}">Edit</a></button>
                <button type="button" class="button rounded-0 primary-bg w-100 btn_1 boxed-btn"><a
                        href="{{ route('biketype.show', $bikeType->id) }}">Show</a></button>
                <form action="{{ route('biketype.destroy', $bikeType->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="button rounded-0 primary-bg w-100 btn_1 boxed-btn">Delete</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endforeach

<h1><a href="{{ route('biketype.create') }}">Create Bike Type</a></h1>


@endsection

