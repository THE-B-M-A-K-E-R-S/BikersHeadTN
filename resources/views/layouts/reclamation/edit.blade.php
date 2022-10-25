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

    <form action="{{ route('reclamation.update', $reclamation->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="description">Description</label>
            <input type="text" name="description" id="description" class="form-control" value="{{$reclamation->description}}">
        </div>

        <div class="form-group">
            <label for="date">Date</label>
            <input type="date" name="date" id="date" class="form-control" value="{{$reclamation->date}}">
        </div>

        <div class="form-group">
            <label for="event_type_id">Complain type</label>
            <select class="form-select" name="event_type_id" id="event_type_id" style="color: #41A7A5" class="form-control form-control-lg">
                @foreach ($reclamationTypes as $type)
                    <option value="{{$type->id}}" {{$reclamation->$type == $type ? 'selected' : ''}}>{{$type->label}}</option>
                @endforeach
            </select>
        </div>

        <button type="submit">Update</button>
    </form>
</body>
</html>
