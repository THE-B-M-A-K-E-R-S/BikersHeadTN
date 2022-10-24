@extends('layouts.app')

@section('content')
<div class="top-post-area">
    <div class="container">
        <div class="row">
            <div class="col-24">
                <div class="section-tittle mb-35">
                    <h2>Balades</h2>
                    <div class="list-group-horizontal" style="width: 400px; margin: auto">
                        <form method="GET" action="{{ route('search') }}">
                            {{csrf_field()}}
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
                @foreach($balades as $balade)
                <div class="single-job-items mb-30 col-6">
                    <div class="job-items m-5">
                        <div class="company-img">
                            <img src="{{url($balade->images) }}" alt="Image" style="width: 260px; height: 240px"/>
                        </div>
                        <div class="job-tittle">
                            <a href="{{ route('balade.show', $balade->id) }}"><h4>{{ $balade->name }}</h4></a>
                            <h4> x {{--{{ event.nbPartMax - event.participants.count }}--}} places left !</h4>
                            <h4>{{ date('d-m-Y', strtotime($balade->date)) }}</h4>
                            <p>{{ $balade->description }}</p>
{{--
                            {% if (event.nbPartMax - event.participants.count)>0 and event.date|date('m-d-Y') > 'now'|date('m-d-Y') %}
--}}
                            <button type="button" class="button rounded-0 primary-bg w-100 btn_1 boxed-btn">Participate</button>
{{--
                            {% endif %}
--}}
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>


<h1><a href="{{ route('balade.create') }}">Create Balade</a></h1>

@endsection


{{--

{% if not paginator == false %}
<!--Pagination Start  -->
<div class="pagination-area text-center navigation">
    <div class="container">
        <div class="row">
            <div class="col-xl-12">
                <div class="single-wrap d-flex justify-content-center">
                    <nav aria-label="Page navigation example">
                        {{ knp_pagination_render(events) }}
                    </nav>
                </div>
            </div>
        </div>
    </div>
</div>
<!--Pagination End  -->
{% endif %}
--}}




{{--
<html>

<h1>All Balades</h1>
<table>
    <thead>
        <tr>
            <th>Id</th>
            <th>Name</th>
            <th>Description</th>
            <th>Date</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach($balades as $balade)
        <tr>
            <td>{{ $balade->id }}</td>
            <td>{{ $balade->name }}</td>
            <td>{{ $balade->description }}</td>

            <td>{{ date('d-m-Y', strtotime($balade->date)) }}</td>
            <td>
                <a --}}
{{--href="{{ route('balade.show', $balade->id) }}" --}}{{--
>Show</a>
                <a --}}
{{--href="{{ route('balade.edit', $balade->id) }}" --}}{{--
>Edit</a>
                <form --}}
{{--action="{{ route('balade.destroy', $balade->id) }}" --}}{{--
 method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

</html>--}}
