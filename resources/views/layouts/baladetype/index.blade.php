@extends('layouts.app')

@section('content')

<h1>All Balade Types</h1>
<div class="container-fluid col-12">
    <div class="col-lg-12 col-md-12 container-fluisd  d-flex flex-wrap">
    @foreach($baladeTypes as $baladeType)
                <div class="single-job-items mb-30 col-6">
                    <div class="job-items m-5">
                    <a href="{{ route('baladetype.show', $baladeType->id) }}" style="text-align: center"><h4>{{ $baladeType->name }}</h4></a>
                    <button type="button" class="button rounded-0 primary-bg w-100 btn_1 boxed-btn"><a href="{{ route('baladetype.edit', $baladeType->id) }}">Edit</a></button>
                    <button type="button" class="button rounded-0 primary-bg w-100 btn_1 boxed-btn"><a href="{{ route('baladetype.show', $baladeType->id) }}">Show</a></button>
                    <form action="{{ route('baladetype.destroy', $baladeType->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="button rounded-0 primary-bg w-100 btn_1 boxed-btn">Delete</button>
                    </form>
                </div>
            </div>
            </div>
        </div>
    @endforeach

<h1><a href="{{ route('baladetype.create') }}">Create Balade Type</a></h1>


@endsection

</html>
