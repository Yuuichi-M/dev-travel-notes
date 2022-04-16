<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    @hasSection('title')
    <title>
        @yield('title') | {{ config('app.name') }}
    </title>
    @else
    <title>{{ config('app.name') }}</title>
    @endif

    @if(config('app.env') === 'production')
    <link rel="shortcut icon" href="{{ secure_asset('/images/favicon.ico') }}">
    @else
    <link rel="shortcut icon" href="{{ asset('/images/favicon.ico') }}">
    @endif

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.3/css/all.css" integrity="sha384-SZXxX4whJ79/gErwcOYf+zWLeJdY/qpuqC4cAa9rOGUstPomtqpuNWT9wdPEn2fk" crossorigin="anonymous">
    <!-- Bootstrap core CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
    <!-- Material Design Bootstrap -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.8.11/css/mdb.min.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Righteous&display=swap" rel="stylesheet">
    <script src="{{ mix('js/app.js') }}"></script>

    <!-- Scripts -->
    @if(config('app.env') === 'production')
    <script src="{{ secure_asset('js/app.js') }}" defer></script>
    @else
    <script src="{{ asset('js/app.js') }}" defer></script>
    @endif

    @if(config('app.env') === 'production')
    <link rel="stylesheet" href="{{ secure_asset('css/app.css') }}">
    @else
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    @endif

</head>

<body>
    @auth
    <div style="padding-top: 4rem">
        @else
        <div class="home-pt">
            @endauth
            <div id="app">
                @yield('content')
            </div>
        </div>
        <!-- JQuery -->
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <!-- Bootstrap tooltips -->
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.4/umd/popper.min.js"></script>
        <!-- Bootstrap core JavaScript -->
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/js/bootstrap.min.js"></script>
        <!-- MDB core JavaScript -->
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.8.11/js/mdb.min.js"></script>

</body>

</html>
