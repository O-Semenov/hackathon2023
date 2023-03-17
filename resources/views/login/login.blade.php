<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
</head>
<body>

Login
<br>
<br>

<form method="POST" autocomplete="off" action="/login">
    @csrf
    <input id="email" type="email" class="form-control" name="email" value="" required="" autofocus="" placeholder="login">
    <br>
    <br>
    <input id="password" type="password" class="form-control" name="password" required="" placeholder="password">
    <br>
    <br>
    <button type="submit" class="btn btn-dark btn-block">
        Login
    </button>
</form>

<br>
<span>login: test@test.com</span>
<br>
<span>password: 12345</span>

</body>
</html>
