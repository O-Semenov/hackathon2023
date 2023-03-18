<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin</title>
</head>
<body>

<h2>Создать нового пользователя</h2>

<form method="POST" autocomplete="off" action="/register">
    @csrf
    <input name="surname" placeholder="Фамилия">
    <br><br>
    <input name="name" placeholder="Имя">
    <br><br>
    <input name="patronymic" placeholder="Отчество">
    <br><br>
    <input name="email" placeholder="email">
    <br><br>
    <input name="password" type="password" placeholder="пароль">
    <br><br>
    Отдел:
    <select name="department_id" id="department">
        @foreach($departments as $department)
            <option value="{{ $department->id }}">{{ $department->name }}</option>
        @endforeach
    </select>
    <br><br>
    <button type="submit" class="btn btn-dark btn-block">
        Создать пользователя
    </button>
</form>

<br>
<a href="/">Главная</a>

</body>
</html>
