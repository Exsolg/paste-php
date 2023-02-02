<!DOCTYPE html>
<html lang="ru">
    <head>
        <meta charset="utf-8">
        <title>@yield('title')</title>
        <!-- Bootstrap -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
        @yield('styles')
    </head>
    <body>
        <nav class="navbar navbar-light bg-light">
            <div class="container">
                <a href="{{redirect('/')}}" class="navbar-brand mb-0 h1">PasteClone</a>
                <a href="{{redirect('/')}}"><span class="btn btn-primary">New paste</span></a>
            </div>
        </nav>
        <div class="container">
            @yield('content')
        </div>
    </body>
</html>
