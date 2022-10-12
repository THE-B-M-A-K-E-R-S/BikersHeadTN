<html lang="">

<h1>All Events</h1>
<table>
    <thead>
        <tr>
            <th>Id</th>
            <th>title</th>
            <th>description</th>
            <th>date</th>
            <th>location</th>
            <th>type</th>
            <th>actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach($events as $event)
        <tr>
            <td>{{ $event->id }}</td>
            <td>{{ $event->title }}</td>
            <td>{{ $event->description }}</td>
            <td>{{ date('d-m-Y', strtotime($event->date)) }}</td>
            <td>{{ $event->location }}</td>
            <td>{{ $event->eventType->name }}</td>
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
