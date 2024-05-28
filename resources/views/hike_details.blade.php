<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>hike detail</title>
</head>

<body>
    <table>
        <tr>
            <th>name</th>
            <th>location</th>
            <th>distance</th>
            <th>duration</th>
            <th>elevation gain</th>
            <th>description</th>
            <th>created at:</th>
            <th>updated at:</th>
        </tr>
        <tr>
            <td>{{ $hike->name }}</td>
            <td>{{ $hike->location }}</td>
            <td>{{ $hike->distance}}</td>
            <td>{{ $hike->duration }}</td>
            <td>{{ $hike->elevation_gain }}</td>
            <td>{{ $hike->description }}</td>
            <td>{{ $hike->created_at }}</td>
            <td>{{ $hike->updated_at }}</td>

        </tr>
    </table>

</html>
</body>