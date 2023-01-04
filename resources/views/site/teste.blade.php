<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body {background-color: #333;}
        a {color: #fff;}
    </style>
    <title>Sobre nós</title>
</head>
<body>
    <ul>
        <li>
            <a href="{{ route('site.index') }}">Principal</a>
        </li>
        <li>
            <a href="{{ route('site.sobrenos') }}">sobre-nos</a>
        </li>
        <li>
            <a href="{{ route('site.contato') }}">contato</a>
        </li>
        <li>
            p1 = {{ $p1 }};
        </li>
        <li>
            p2 = {{ $p2 }};
        </li>
    </ul>
</body>
</html>
