<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All Hikes</title>
</head>

<body>
    <h1>All Hikes</h1>
    <a href="/">Home</a>
    <ul>
        @foreach ($hikes as $hike)
        <li>
            <a href="{{ route('hike.details', ['id' => $hike->id]) }}">{{ $hike->name }}</a>
            ({{ $hike->location }})
        </li>
        @endforeach
    </ul>
</body>

</html>