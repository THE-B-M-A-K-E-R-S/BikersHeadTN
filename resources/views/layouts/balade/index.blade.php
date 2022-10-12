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
