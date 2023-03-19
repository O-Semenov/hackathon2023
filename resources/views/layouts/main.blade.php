
<?php
$user = \Illuminate\Support\Facades\Auth::user();
$auth = \Illuminate\Support\Facades\Auth::check();
?>

<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>

    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Main</title>
    <script src="{{ asset("js/app.js") }}"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <link rel='stylesheet prefetch' href='https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css'>
    <link rel='stylesheet prefetch' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.2/css/font-awesome.min.css'>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <link rel="stylesheet" class="cp-pen-styles" href="{{ asset("css/app.css") }}">

    <style>
        .wave {
            position: absolute;
            top: -100px;
            left: 0;
            width: 100%;
            height: 100px;
            background: url({{asset("wave.png")}});
            background-size: 1000px 100px;
        }
    </style>

    @yield('head')
</head>
<body>

<header class="fixed-top shadow">
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="head-link" href="/user/{{ $user->id }}">
                @if($user->img == null)
                    <img class="img-profile" src="https://sun9-77.userapi.com/impg/3Z7R7ouJMMe6XY0Tum6mA4k-fa9fOWTvnxkTag/AnKuFaCppJg.jpg?size=626x626&quality=96&sign=72142bf9e93b1bf2097dc0627498e1fa&type=album" alt="" />
                @else
                    <img class="img-profile" src="{{asset('storage'). '/' . $user->img}}" alt="" class="account-profile" alt="">
                @endif
                {{ $user->surname . ' ' . $user->name }}
            </a>

            <div class="vr"></div>

            @if ($user->role == 0)
                <a class="head-link" href="/admin">Админка</a>
            @endif
            <a class="head-link" href="/messanger">Сообщения</a>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                </ul>
                <a class="btn btn-outline-danger" type="button" href="/logout">Выход</a>
            </div>
        </div>
    </nav>
</header>

<div class="space"></div>


@yield('body')


<footer class="footer">
    <div class="waves">
        <div class="wave" id="wave1"></div>
        <div class="wave" id="wave2"></div>
        <div class="wave" id="wave3"></div>
        <div class="wave" id="wave4"></div>
    </div>

    <p>© 2023 | Твой кролик написал</p>
</footer>

</body>
</html>
