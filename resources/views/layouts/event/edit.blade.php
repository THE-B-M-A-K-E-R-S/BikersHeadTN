<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>


    <h1> Edit a Bike</h1>

    <form action="{{ route('bike.update', $event->id) }}" method="POST">
        @csrf
        @method('PUT')
        <label for="name">Name</label>
        <input type="text" name="name" id="name" value="{{ $event->name }}">
        <br>
        <label for="title">Title</label>
        <input type="text" name="title" id="title" value="{{ $event->title }}">
        <br>

        <label>Description</label>
        <input type="text" name="description" id="description" value="{{$event->description}}">

        <br>
        <label for="model">Location</label>
        <input type="text" name="location" id="location" value="{{ $event->location }}">
        <br>
        <label for="type">Type</label>
        <input type="text" name="eventType" id="eventType" value="{{ $event->eventType }}">
        <br>


        <button type="submit">Update</button>

    </form>



</body>

</html>
