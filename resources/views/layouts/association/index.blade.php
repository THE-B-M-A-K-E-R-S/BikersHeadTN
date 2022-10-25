@extends('layouts.app')

@section('content')
<html lang="">

<h1>All Associations</h1>
<form class="form-inline" method="GET">
    <div class="form-group mb-2">
        <label for="filter" class="col-sm-2 col-form-label">Filter</label>
        <input type="text" class="form-control" id="filter" name="filter" placeholder="Association name..." value="{{$filter}}">
    </div>
    <button type="submit" class="btn btn-default mb-2">Filter</button>
</form>
<div class=" container-fluid col-12">
    <div class="col-lg-12 col-md-12 container-fluid  d-flex flex-wrap">
<table>
    <thead>
    <tr>
        <th>@sortablelink('id', 'Id')</th>
        <th>@sortablelink('name', 'Name')</th>
        <th>@sortablelink('description', 'Description')</th>
        <th>@sortablelink('address', 'Address')</th>
        <th>@sortablelink('number', 'Number')</th>
        <th>@sortablelink('pres_Name', 'President Name')</th>
        <th>@sortablelink('type', 'Type')</th>
    </tr>
    </thead>
    <tbody>
    @if($associations->count())
        @foreach($associations as $association)
        <tr>
            <td>{{ $association->id }}</td>
            <td>{{ $association->name }}</td>
            <td>{{ $association->description }}</td>
            <td>{{ $association->address }}</td>
            <td>{{ $association->number }}</td>
            <td>{{ $association->pres_Name }}</td>
            <td>{{ $association->associationType->name }}</td>
            <td>
                <a href="{{ route('association.show', $association->id) }}">Show</a>
                <a href="{{ route('association.edit', $association->id) }}">Edit</a>
                <form action="{{ route('association.destroy', $association->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" >Delete</button>
                </form>
            </td>
        </tr>
    @endforeach
    @endif
    </tbody>
</table>

    </div>
</div>
<div class="row-cols-12 max-width-50px">
    {!! $associations->appends(\Request::except('page'))->render() !!}
</div>
</html>
@endsection
