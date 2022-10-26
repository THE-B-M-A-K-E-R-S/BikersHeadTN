<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>


    <h1> Edit a Bike type</h1>

    <form action="{{ route('biketype.update', $bikeType->id) }}" method="POST">
        @csrf
        @method('PUT')

        <label for="name">Title</label>
        <input type="text" name="name" id="name" value="{{ $bikeType->name }}">
        <br>


        <button type="submit">Update</button>

    </form>



</body>

</html>
