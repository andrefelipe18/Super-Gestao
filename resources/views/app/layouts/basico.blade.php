<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <title>Super Gestão - @yield('titulo')</title>
        <meta charset="utf-8">
        <link rel="stylesheet" href="{{ asset('css/estilos_basicos.css') }}">
        <link rel="shortcut icon" href="{{ asset('img/logo.png') }}" type="image/x-icon">
    </head>
    <body>
        @include('app.layouts._partials.topo')
        @yield('conteudo')
    </body>
    </html>

