<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Indie+Flower&display=swap" rel="stylesheet"> 
<link href="{{asset('css/estilo1.css')}}" rel="stylesheet">
    <title>@yield('titulo')</title>
</head>
<body style="background-color:bisque">
    <h3 class='text-center grande mt-3'>@yield('cabecera')</h3>
    <div class="container mt-3">
        @yield('contenido')
    </div>
</body>
</html>