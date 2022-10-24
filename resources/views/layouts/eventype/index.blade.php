@extends('layouts.app')

{{--@section('content')--}}
{{--    <html lang="">--}}
{{--    <h1>All Event Types</h1>--}}
{{--    <table>--}}
{{--        <thead>--}}
{{--        <tr>--}}
{{--            <th>Id</th>--}}
{{--            <th>Name</th>--}}
{{--        </tr>--}}
{{--        </thead>--}}
{{--        <tbody>--}}
{{--        @foreach($eventTypes as $eventType)--}}
{{--            <tr>--}}
{{--                <td>{{ $eventType->id }}</td>--}}
{{--                <td>{{ $eventType->name }}</td>--}}
{{--                <td>--}}

{{--                </td>--}}
{{--            </tr>--}}
{{--        @endforeach--}}
{{--        </tbody>--}}
{{--    </table>--}}
{{--    </html>--}}
{{--@endsection--}}
@section('content')
<h1><a href="{{ route('eventype.create') }}">Create Event type</a></h1>
<div class="top-post-area">
    <div class="container">
        <div class="row">
            <div class="col-24">
                <div class="section-tittle mb-35">
                    <h2>All Event Types</h2>
                    <div class="list-group-horizontal" style="width: 400px; margin: auto">
                        <form method="post" {{--action="{{ path('event_search') }}"--}}>
                            <ul class="list-group list-group-horizontal">
                                <li class="list-group-item">
                                    <input type="text" name="search" id="input" class="form-control col-20" placeholder="search Balades"
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
                        <form method="post" {{--action="{{ path('event_tri') }}"--}}>
                            <ul class="list-group list-group-horizontal">
                                <li class="list-group-item text-center">Trier Par</li>
                                <li class="list-group-item">
                                    <select id="select" name="tri" class="form-control form-control-lg">
                                        <option selected>id</option>
                                        <option value="name">name</option>
                                        <option>date</option>
                                        <option>HARD</option>
                                        <option>MEDIUM</option>
                                        <option>EASY</option>
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
                @foreach($eventTypes as $eventType)
                    <div class="single-job-items mb-30 col-6">
                        <div class="job-items m-5">
                            <div class="job-tittle">
                                <a {{--href="{{ path('event_show', {'id': $balade->id}) }}"--}}><h4>{{ $eventType->name }}</h4></a>
                            </div>
                            <a href="{{ route('eventype.edit', $eventType->id) }}">Edit</a>
                            <form action="{{ route('eventype.destroy', $eventType->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit">Delete</button>
                            </form>
                        </div>

                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>



@endsection




