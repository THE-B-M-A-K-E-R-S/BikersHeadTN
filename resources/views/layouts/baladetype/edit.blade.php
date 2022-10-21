<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>


    <h1> Edit a BaladeType</h1>

    <form action="{{ route('baladetype.update', $baladeType->id) }}" method="POST">
        @csrf
        @method('PUT')

        <label for="name">Title</label>
        <input type="text" name="name" id="name" value="{{ $baladeType->name }}">
        <br>


        <button type="submit">Update</button>

    </form>



</body>

</html>
