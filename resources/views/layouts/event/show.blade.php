<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>


    <h1> event details </h1>

    <a class="btn btn-primary" href="{{ route('event.index') }}"> Back</a>


    <div class="form-group">
        <strong>Title:</strong>
        {{ $event->title }}
    </div>

    <div class="form-group">
        <strong>Description:</strong>
        {{ $event->description }}
    </div>


    <div class="form-group">
        <strong>Location:</strong>
        {{ $event->location }}

    </div>

    <div class="form-group">
        <strong>EventType:</strong>
        {{ $event->eventType }}

    </div>

</body>

</html>
