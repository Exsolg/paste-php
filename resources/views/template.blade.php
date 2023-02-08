<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <title>@yield('title')</title>
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    @yield('styles')
</head>
<body>
    <nav class="navbar navbar-light bg-light mx-4">
        <a href="{{ url('/') }}" class="navbar-brand mb-0 h1">PasteClone</a>
        @if(Auth::check()) <a href="{{ url('/pastes') }}" class="navbar-brand">Pastes</a> @endif
        <div class="navbar-nav-inline">
            @if(!Auth::check())
                <a href="{{ url('/login') }}" class="nav-item me-2 text-decoration-none">Login</a>
                <a href="{{ url('/register') }}" class="nav-item me-2 text-decoration-none">Sign Up</a>
            @else
                <a href="{{ url('/logout') }}" class="nav-item me-2 text-decoration-none">Logout</a>
            @endif

            <a href="{{ url('/') }}"><span class="btn btn-primary">New paste</span></a>
        </div>
    </nav>

    <div class="container my-2">
        @yield('content')
        @include('pastes.components.last')
    </div>
</body>
</html>
