<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    <script src="{{ asset("js/app.js") }}"></script>
    <link rel="stylesheet" class="cp-pen-styles" href="{{ asset("css/app.css") }}">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <link rel='stylesheet prefetch' href='https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css'>
    <link rel='stylesheet prefetch' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.2/css/font-awesome.min.css'>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

</head>
<body class="text-center">
<main class="form-signin">
    <div class="block">
        <h1 class="h3 mb-3 fw-normal">Авторизация</h1>
        <form class="" method="POST" autocomplete="off" action="/login">
            @csrf
            <div class="p-3">
                <div class="form-floating">
                    <input id="email" type="email" class="form-control" name="email" placeholder="login">
                    <label for="floatingInput">Почта</label>
                </div>
                <br>
                <div class="form-floating">
                    <input id="password" type="password" class="form-control" name="password" required="" placeholder="password">
                    <label for="floatingPassword">Пароль</label>
                </div>
            </div>
            <button type="submit" class="btn w-50" style="background-color: #FF5108; color:white">
                Войти
            </button>
        </form>
        <p class="mt-5 mb-3 text-muted">© 2023</p>
    </div>
</main>

</body>
</html>
