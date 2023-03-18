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


<h2>Редактирование пользователя</h2>

<form method="GET" autocomplete="off" action="/user_edit/{{ $user->id }}">
    @csrf
    <input name="surname" placeholder="Фамилия" value="{{ $user->surname }}">
    <br><br>
    <input name="name" placeholder="Имя" value="{{ $user->name }}">
    <br><br>
    <input name="patronymic" placeholder="Отчество" value="{{ $user->patronymic }}">
    <br><br>
    <input name="email" placeholder="email" value="{{ $user->email }}">
    <br><br>
    Отдел:
    <select name="department_id" id="department">
        @foreach($departments as $department)
            <option value="{{ $department->id }}" @if($user->department_id == $department->id)selected @endif>{{ $department->name }}</option>
        @endforeach
    </select>
    <br><br>
    Уровень доступа:
    <select name="role" id="role">
        <option value="1" @if($user->role == 1)selected @endif>Уровень доступа 1</option>
        <option value="2" @if($user->role == 2)selected @endif>Уровень доступа 2</option>
    </select>
    <br><br>
    <button type="submit" class="btn btn-dark btn-block">
        Сохранить изменения
    </button>
</form>

<br>
<a href="/">Главная</a>

</body>
</html>
