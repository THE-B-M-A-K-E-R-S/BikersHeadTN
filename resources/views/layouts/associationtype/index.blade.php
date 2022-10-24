@extends('layouts.app')

@section('content')
    <html lang="">

    <h1>All Associations types</h1>
    <div class=" container-fluid col-12">
        <div class="col-lg-12 col-md-12 container-fluid  d-flex flex-wrap">
            <table>
                <thead>
                <tr>
                    <th>Id</th>
                    <th>Name</th>
                </tr>
                </thead>
                <tbody>
                @foreach($associationTypes as $association)
                    <tr>
                        <td>{{ $association->id }}</td>
                        <td>{{ $association->name }}</td>
                        <td>
                            <a href="{{ route('associationtype.show', $association->id) }}">Show</a>
                            <a href="{{ route('associationtype.edit', $association->id) }}">Edit</a>
                            <form action="{{ route('associationtype.destroy', $association->id) }}" method="POST">
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
