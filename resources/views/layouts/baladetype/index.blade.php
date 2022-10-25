@extends('layouts.app')

@section('content')
<html lang="">

<h1>All Balade Types</h1>
<table>
    <thead>
    <tr>
        <th>Id</th>
        <th>Name</th>
    </tr>
    </thead>
    <tbody>
    @foreach($baladeTypes as $baladeType)
        <tr>
            <td>{{ $baladeType->id }}</td>
            <td>{{ $baladeType->name }}</td>
            <td>
                <a href="{{ route('baladetype.show', $baladeType->id) }}">Show</a>
                <a href="{{ route('baladetype.edit', $baladeType->id) }}">Edit</a>
                <form action="{{ route('baladetype.destroy', $baladeType->id) }}" method="POST">
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
