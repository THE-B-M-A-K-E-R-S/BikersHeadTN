@extends('layouts.app')

@section('content')
<html lang="">

<h1>All Associations</h1>
<div class=" container-fluid col-12">
    <div class="col-lg-12 col-md-12 container-fluid  d-flex flex-wrap">
<table>
    <thead>
    <tr>
        <th>Id</th>
        <th>Name</th>
        <th>Description</th>
        <th>Address</th>
        <th>Number</th>
        <th>President name</th>
        <th>Type</th>
    </tr>
    </thead>
    <tbody>
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
    </tbody>
</table>
    </div>
</div>
</html>
@endsection
