<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>


    <h1> bike details </h1>

    <a class="btn btn-primary" href="{{ route('bike.index') }}"> Back</a>

    <div class="form-group">
        <strong>Name:</strong>
        {{ $bike->name }}
    </div>

    <div class="form-group">
        <strong>Color:</strong>
        {{ $bike->color }}
    </div>

    <div class="form-group">
        <strong>Brand:</strong>
        {{ $bike->brand }}

    </div>


    <div class="form-group">
        <strong>Model:</strong>
        {{ $bike->model }}


    </div>

    <div class="form-group">
        <strong>Type:</strong>
        {{ $bike->type }}

    </div>

    <div class="form-group">
        <strong>Size:</strong>
        {{ $bike->size }}

    </div>

    <div class="form-group">
        <strong>Price:</strong>
        {{ $bike->price }}

    </div>


    <div class="form-group">
        <strong>Description:</strong>
        {{ $bike->description }}


    </div>






</body>

</html>