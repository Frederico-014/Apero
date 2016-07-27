<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Apero</title>
    <link rel="stylesheet" href="{{url('assets/css/app.min.css')}}">
</head>
<body>

<header>
    <h1>Apéros technique</h1>
    <nav>
        <h2>
            <a href="{{url('')}}">Accueil</a>
            <a href="{{url('search')}}">Chercher apéro</a>
            <a href="{{url('new')}}">Organiser apéro</a>
            @if(Auth::guest())
                <a href="{{url('login')}}">Se connecter</a>
            @else
                @if(Auth::user() && Auth::user()->isAdmin())
                    <a href="#">Administration du site</a>
                @endif
                <a href="{{url('logout')}}">Se deconnecter</a>
            @endif
        </h2>
    </nav>
</header>

<div class="containeur grid-2-1">
    <section>
        @yield('content')
    </section>
</div>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
<script src="{{url('assets/js/app.min.js')}}"></script>
</body>
</html>