<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>


<h1> baladeType details </h1>

<a class="btn btn-primary" href="{{ route('baladetype.index') }}"> Back</a>


<div class="form-group">
    <strong>Name:</strong>
    {{$baladeType->name }}
</div>

</body>

</html>
