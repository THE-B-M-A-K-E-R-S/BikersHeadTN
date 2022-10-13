<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>


    <h1>All Bikes</h1>


    <table aria-describedby="table of all bikes">
        <thead>
            <tr>
                <th>Id</th>
                <th>Name</th>
                <th>price</th>
                <th>Color</th>
                <th>Brand</th>
                <th>Model</th>
                <th>Description</th>
                <th>Type</th>
                <th>size</th>
                <th>Actions</th>
            </tr>
        </thead>

        <tbody>
            @foreach($bikes as $bike)
            <tr>
                <td>{{ $bike->id }}</td>
                <td>{{ $bike->name }}</td>
                <td>{{ $bike->price }}</td>
                <td>{{ $bike->color }}</td>
                <td>{{ $bike->brand }}</td>
                <td>{{ $bike->model }}</td>
                <td>{{ $bike->description }}</td>
                <td> {{ $bike->type }}</td>
                <td> {{ $bike->size }}</td>
                <td>
                    <a href="{{ route('bike.show', $bike->id) }}">Show</a>
                    <a href="{{ route('bike.edit', $bike->id) }}">Edit</a>
                    <form action="{{ route('bike.destroy', $bike->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach

        </tbody>



    </table>





</body>

</html>