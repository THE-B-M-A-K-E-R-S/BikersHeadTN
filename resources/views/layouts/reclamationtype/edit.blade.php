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

    <form action="{{ route('reclamationtype.update', $reclamationType->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="description">Label</label>
            <input type="text" name="label" id="label" class="form-control" value="{{$reclamationType->label}}">
        </div>

        <button type="submit">Update</button>
    </form>
</body>
</html>
