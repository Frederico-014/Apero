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
    <h1>Admin du site</h1>
    <nav>
        <h2>
            <a href="{{url('')}}">Site public</a>
            <a href="{{url('admin/Apero')}}">Accueil admin</a>
            <p>hello {{Auth::user()->username}}</p>
            <a href="{{url('logout')}}">Se deconnecter</a>
        </h2>
    </nav>
</header>

<div class="containeur grid-2-1">
    <section>
        @include('admin.partials.flash_message')
        @yield('content')
    </section>
</div>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
<script src="{{url('assets/js/app.min.js')}}"></script>
</body>
</html>