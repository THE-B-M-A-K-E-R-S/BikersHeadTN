<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>


    <h1> Create a new Bike</h1>

    <form action="{{ route('bike.store') }}" method="POST" enctype="multipart/form-data">
        {{ csrf_field() }}
        <label for="name">Name</label>
        <input type="text" name="name" id="name" value="{{ old('name') }}">
        <br>
        <label for="color">Color</label>
        <input type="text" name="color" id="color" value="{{ old('color') }}">
        <br>


        <label for="brand">Brand</label>
        <input type="text" name="brand" id="brand" value="{{ old('brand') }}">
        <br>
        <label for="model">Model</label>
        <input type="text" name="model" id="model" value="{{ old('model') }}">
        <br>
        <label for="type">Type</label>
        <input type="text" name="type" id="type" value="{{ old('type') }}">
        <br>

        <label for="size">size</label>
        <input type="text" name="size" id="size" value="{{ old('size') }}">
        <br>
        <label for="price">Price</label>
        <input type="text" name="price" id="price" value="{{ old('price') }}">
        <br>
        <label for="description">Description</label>
        <input type="text" name="description" id="description" value="{{ old('description') }}">
        <br>
        <label>Choose Images</label>
        <input type="file" name="image[]" multiple>


        <button type="submit">Create</button>

</body>

</html>