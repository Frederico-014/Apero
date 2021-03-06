<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Apero</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
          integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" href="{{url('assets/css/app.min.css')}}">
</head>
<body>

<nav class="navbar navbar-inverse ">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar"
                    aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="{{url('')}}">Site public</a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
            <ul class="nav navbar-nav navbar-right">
                <li {!! Request::url() == url('admin/Apero')? 'class="active"' : '' !!}><a
                            href="{{url('admin/Apero')}}">Accueil admin</a></li>
                <li {!! Request::url() == url('admin/user')? 'class="active"' : '' !!}><a href="{{url('admin/user')}}">Gestion des Utilisateurs</a></li>
                <li><a>hello {{Auth::user()->username}}</a></li>
                <li><a href="{{url('logout')}}">Se deconnecter</a></li>
            </ul>
        </div><!--/.nav-collapse -->
    </div>
</nav>
<div class="container">
    <div class="starter-template row ">
        <div class="col-xs-12 col-sm-6 col-lg-8">
            <section>
                @yield('content')
            </section>
        </div>
        <div class="col-xs-6 col-lg-4">
            <aside>
                @include('admin.partials.flash_message')
            </aside>
        </div>
    </div>

</div><!-- /.container -->


<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"
        integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa"
        crossorigin="anonymous"></script>
<script src="{{url('assets/js/app.min.js')}}"></script>
</body>
</html>