
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
    <title>Document</title>
</head>
<body>
@if($auth)
    <h1><?= $user->name ?></h1>
    @if ($user->role == 0)
        <span>Администратор</span>
    @elseif ($user->role == 1)
        <span>Директор</span>
    @elseif ($user->role == 2)
        <span>Сотрудник</span>
    @endif
    <br>
    <br>
    <br>
    <a class="dropdown-item" href="/logout">Выход</a>
@endif
</body>
</html>
