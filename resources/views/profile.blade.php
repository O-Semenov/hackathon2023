
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
    <title>Main</title>
    <script src="{{ asset("js/app.js") }}"></script>
    <link rel="stylesheet" class="cp-pen-styles" href="{{ asset("css/app.css") }}">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <link rel='stylesheet prefetch' href='https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css'>
    <link rel='stylesheet prefetch' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.2/css/font-awesome.min.css'>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
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
</head>
<body>
<header>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            @if ($user->role == 0 || $user->role == 1)
                <a class="navbar-brand" href="/admin">Админка</a>
            @endif
            <a class="navbar-brand" href="/messanger">Сообщения</a>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                </ul>
                <a class="btn btn-outline-danger" type="button" href="/logout">Выход</a>
            </div>
        </div>
    </nav>
</header>
@if($auth)
    <div class="container">
        <div class="row">
            <div class="col-md-3 pt-5 col-lg-4">
                <img src="https://plus.unsplash.com/premium_photo-1668473367234-fe8a1decd456?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1932&q=80" class="img-thumbnail" alt="...">
            </div>
            <div class="col-md-2 col-lg-3">
                <h5 class="mb-4 p-5">Профиль ....</h5>
                    <div class="row g-5">
                    </div>
                    <div class="row g-3">
                        <div class="col-12">
                            <label class="form-label">Имя: </label>
                            кек
                        </div>

                        <div class="col-12">
                            <label class="form-label">Фамилия: </label>
                            лол
                        </div>

                        <div class="col-12">
                            <label class="form-label">Отчество: </label>
                            лол
                        </div>

                        <div class="col-12">
                            <label class="form-label">Должность: </label>
                            лол
                        </div>

                        <div class="col-12">
                            <label class="form-label">Уровень доступа: </label>
                            лол
                        </div>
                </div>
            </div>
        </div>
    </div>
@endif

    <footer class="footer fixed-bottom">
        <div class="waves">
            <div class="wave" id="wave1"></div>
            <div class="wave" id="wave2"></div>
            <div class="wave" id="wave3"></div>
            <div class="wave" id="wave4"></div>
        </div>

        <p>© 2023 | Твой кролик написал</p>
    </footer>

</body>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</html>

