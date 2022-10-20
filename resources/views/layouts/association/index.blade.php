<html lang="">

<h1>All Associations</h1>
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
                <a {{--href="{{ route('balade.show', $balade->id) }}"--}}>Show</a>
                <a {{--href="{{ route('balade.edit', $balade->id) }}"--}}>Edit</a>
                <form {{--action="{{ route('balade.destroy', $balade->id) }}"--}} method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Delete</button>
                </form>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>

</html>
