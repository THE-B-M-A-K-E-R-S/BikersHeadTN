@extends('layouts.app')

@section('content')
<html lang="">

<h1>All Event  Types</h1>
<table>
    <thead>
    <tr>
        <th>Id</th>
        <th>Name</th>
    </tr>
    </thead>
    <tbody>
    @foreach($eventTypes as $eventType)
        <tr>
            <td>{{ $eventType->id }}</td>
            <td>{{ $eventType->name }}</td>
            <td>
                <a href="{{ route('eventype.show', $eventType->id) }}">Show</a>
                <a href="{{ route('eventype.edit', $eventType->id) }}">Edit</a>
                <form action="{{ route('eventype.destroy', $eventType->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Delete</button>
                </form>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>

@endsection

</html>
