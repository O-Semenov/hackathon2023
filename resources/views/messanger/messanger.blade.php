<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Сообщения</title>
</head>
<body>

<h1>Сообщения</h1>

@foreach($users as $user)
    <a href="messanger/user/{{ $user->id }}">{{ $user->surname }} {{ mb_substr($user->name, 0, 1) }}. {{ mb_substr($user->patronymic, 0, 1) }}.</a>
    <br>
@endforeach

<br>
<a href="/">Главная</a>

</body>
</html>
