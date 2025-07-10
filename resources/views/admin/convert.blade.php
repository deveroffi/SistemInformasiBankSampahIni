<!-- resources/views/coordinates.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Coordinates</title>
</head>
<body>
    <h1>Coordinates</h1>
    @if ($coordinates)
        <p>Latitude: {{ $coordinates['latitude'] }}</p>
        <p>Longitude: {{ $coordinates['longitude'] }}</p>
    @else
        <p>Error: Unable to get coordinates for the address.</p>
    @endif
</body>
</html>
