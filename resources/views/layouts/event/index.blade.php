
@extends('layouts.app')

@section('content')
    <div class="top-post-area">
        <div class="container">
            <h3><a href="{{ route('event.create') }}">Create Event</a></h3>
            <h3><a href="{{ route('eventype.create') }}">Create Type</a></h3>

            <div class="row">
                <div class="col-24">
                    <div class="section-tittle mb-35">
                        <h2>All events</h2>
                        <div class="list-group-horizontal" style="width: 400px; margin: auto">
                            <form method="GET" action="{{ route('search') }}">
                                {{csrf_field()}}
                                <ul class="list-group list-group-horizontal">
                                    <li class="list-group-item">
                                        <input type="text" name="search" id="input" class="form-control col-20" placeholder="search Events"
                                               aria-label="Search" style="float: left; height: 50px"/></li>
                                    <li class="list-group-item"> <button  type="submit" class="button rounded-0 primary-bg text-black w-100 btn_1 boxed-btn col-20" style="height: 50px">
                                            <i class="fas fa-search"></i>
                                        </button>
                                    </li>
                                </ul>
                            </form>
                        </div>


                        {{--Tri--}}
                        <div class="list-group-horizontal" style="width: 400px; margin: auto">
                            <form method="GET" action="{{ route('tri') }}">
                                {{csrf_field()}}
                                <ul class="list-group list-group-horizontal">
                                    <li class="list-group-item text-center">Trier Par</li>
                                    <li class="list-group-item">
                                        <select id="select" name="tri" class="form-control form-control-lg">
                                            <option value="ALL" selected>All</option>
                                            <option value="TITLE">title</option>
                                            <option value="DATE">date</option>
                                        </select>
                                    </li>
                                    <li class="list-group-item"> <button  type="submit" class="button rounded-0 primary-bg text-black w-100 btn_1 boxed-btn col-20" style="height: 50px">
                                            <i class="fas fa-search"></i>
                                        </button>
                                    </li>
                                </ul>
                            </form>
                        </div>

                    </div>
                </div>
            </div>
            <div class=" container-fluid col-12">
                <div class="col-lg-12 col-md-12 container-fluid  d-flex flex-wrap">
                    <!-- single-event-content -->
                    @foreach($events as $event)
                        <div class="single-job-items mb-30 col-6">
                            <div class="job-items m-5">
                                <div class="company-img">
                                    @if (count($event->images) > 0)
                                        <img src="{{url('/uploads/events/'. $event->images[count($event->images)-1]->image) }}" alt="Image" style="width: 260px; height: 240px"/>
                                    @endif
                                </div>
                                <div class="job-tittle">
                                    <a href="{{ route('event.show', $event->id) }}"><h4>{{ $event->title }}</h4></a>
                                    <h4>{{ date('d-m-Y', strtotime($event->date)) }}</h4>
                                    <p>{{ $event->description }}</p>
                                    <button type="button" class="button rounded-0 primary-bg w-100 btn_1 boxed-btn"><a href="{{ route('event.edit', $event->id) }}">Edit</a></button>
                                    <button type="button" class="button rounded-0 primary-bg w-100 btn_1 boxed-btn"><a href="{{ route('event.show', $event->id) }}">Show</a></button>
                                    <form action="{{ route('event.destroy', $event->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit">Delete</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>


    <div class="row-cols-12 max-width-50px">
        {!! $events->appends(\Request::except('page'))->render() !!}
    </div>
@endsection


