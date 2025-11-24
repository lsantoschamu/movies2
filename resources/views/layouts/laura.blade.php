<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
</head>
<body>
    <nav>
        <a href="{{ route ('home') }}"> inicio </a>
        <a href="{{ route ('nosotros') }}"> nosotros </a>
</nav>
    <h1>@yield('encabezado')</h1>
    <h1>@yield('contenido')</h1>
</body>
</html>