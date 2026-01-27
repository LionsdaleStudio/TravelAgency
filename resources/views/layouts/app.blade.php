<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    {{-- Bootstrap --}}
    {{-- @vite(['resources/sass/app.scss']) --}}
    {{-- Bootstrap simán --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous">
    </script>


    {{-- Saját css --}}
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>

<body>
    <div class="titleBar">
        <h1>Welcome to our Travel Agency</h1>
        <span>
            @guest
                <form style="display: inline;" action="{{ route('login') }}">
                    <button class="likeAtag">Login</button>
                </form>
                <form style="display: inline;" action="{{ route('register') }}">
                    <button class="likeAtag">Register</button>
                </form>
            @else
                <form action="{{ route('logout') }}" method="post" style="display: inline">
                    @csrf
                    <button class="likeAtag">Logout</button>
                </form>
            @endguest
        </span>
    </div>

    <hr>

    <a href="{{ route('journeys.index') }}">List all available travel destinations</a>

    @can('create', App\Models\Journey::class)
        <a href="{{ route('journeys.create') }}">Add new destination</a>
    @endcan

    @can('showTrashed', App\Models\Journey::class)
        <a href="{{ route('journeys.showTrashed') }}">Show deleted journey records</a>
    @endcan

    @auth
        <a href="{{ route("journeys.userJourneys") }}">My Journeys</a>
    @endauth


    <div class="app-container">
        @yield('content')
    </div>
</body>

</html>
