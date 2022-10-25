<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>


    <h1> Complaint details </h1>

    <a class="btn btn-primary" href="{{ route('reclamation.index') }}"> Back</a>

    <div class="form-group">
        <strong>Description:</strong>
        {{ $reclamation->description }}
    </div>
    <span>{{ $reclamation->date }}</span>

    <div class="form-group">
        <strong>Type:</strong>
        {{ $reclamation->reclamationType }}

    </div>

</body>

</html>
