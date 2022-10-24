<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>


<h1> Association details </h1>

<a class="btn btn-primary" href="{{ route('association.index') }}"> Back</a>

<div class="form-group">
    <strong>Name:</strong>
    {{ $association->name }}
</div>

<div class="form-group">
    <strong>Description:</strong>
    {{ $association->desciption }}
</div>

<div class="form-group">
    <strong>Address:</strong>
    {{ $association->address }}
</div>

<div class="form-group">
    <strong>Presdient name</strong>
    {{ $association->pres_Name }}
</div>

<div class="form-group">
    <strong>Phone number:</strong>
    {{ $association->number }}
</div>

<div class="form-group">
    <strong>Type d'association</strong>
    {{ $association->associationType->name }}
</div>

</body>

</html>
