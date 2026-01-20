<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>

<body>
    <h1>Welcome to our Travel Agency</h1>
    <hr>
    <a href="{{ route('journeys.index') }}">List all available travel destinations</a>
    <a href="{{ route("journeys.create") }}">Add new destination</a>
    <a href="{{ route("journeys.showTrashed") }}">Show deleted journey records</a>

    <div class="app-container">
        @yield('content')
    </div>
</body>

</html>
