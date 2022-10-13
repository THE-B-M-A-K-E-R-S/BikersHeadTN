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

    <form action="{{ route('bike.update', $bike->id) }}" method="POST">
        @csrf
        @method('PUT')
        <label for="name">Name</label>
        <input type="text" name="name" id="name" value="{{ $bike->name }}">
        <br>
        <label for="color">Color</label>
        <input type="text" name="color" id="color" value="{{ $bike->color }}">
        <br>

        <label>Brand</label>
        <input type="text" name="brand" id="brand" value="{{$bike->brand}}">

        <br>
        <label for="model">Model</label>
        <input type="text" name="model" id="model" value="{{ $bike->model }}">
        <br>
        <label for="type">Type</label>
        <input type="text" name="type" id="type" value="{{ $bike->type }}">
        <br>

        <label for="size">size</label>
        <input type="text" name="size" id="size" value="{{ $bike->size }}">
        <br>
        <label for="price">Price</label>
        <input type="text" name="price" id="price" value="{{ $bike->price }}">
        <br>
        <label for="description">Description</label>
        <input type="text" name="description" id="description" value="{{ $bike->description }}">
        <br>

        <button type="submit">Update</button>

    </form>



</body>

</html>