<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>


    <h1> Balade details </h1>

    <a class="btn btn-primary" href="{{ route('balade.index') }}"> Back</a>

    <div class="form-group">
        <strong>Name:</strong>
        {{ $balade->name }}
    </div>

    <div class="form-group">
        <strong>Description:</strong>
        {{ $balade->desciption }}
    </div>

    <div class="form-group">
        <strong>Date:</strong>
        {{ date('d-m-Y', strtotime($balade->date)) }}
    </div>

    <div class="form-group">
        <strong>place:</strong>
        {{ $balade->place }}
    </div>

    <div class="form-group">
        <strong>distance:</strong>
        {{ $balade->distance }}
    </div>

    <div class="form-group">
        <strong>duration:</strong>
        {{ $balade->duration }}
    </div>

    <div class="form-group">
        <strong>max_participants:</strong>
        {{ $balade->max_participants }}
    </div>

    <div class="form-group">
        <strong>difficulty:</strong>
        {{ $balade->difficulty }}
    </div>

</body>

</html>
