<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin</title>
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
<div class="container">
    <main>
        <div class="row">
            <div class="col-md-3 col-lg-4">
            </div>
            <div class="col-md-2 col-lg-3">
                <h5 class="mb-4 p-5">Создать пользователя</h5>
                <form method="POST" class="needs-validation" autocomplete="off" action="/register" enctype="multipart/form-data">
                    @csrf
                    <div class="row g-5">

                    </div>
                    <div class="row g-3">
                        <div class="col-12">
                            <label for="firstName" class="form-label">Имя</label>
                            <input type="text" class="form-control" id="name" placeholder="" value="" required="">
                        </div>

                        <div class="col-12">
                            <label for="lastName" class="form-label">Фамилия</label>
                            <input type="text" class="form-control" id="surname" placeholder="" value="" required="">
                        </div>

                        <div class="col-12">
                            <label for="lastName" class="form-label">Отчество</label>
                            <input type="text" class="form-control" id="patronymic" placeholder="" value="" required="">
                        </div>

                        <div class="col-12">
                            <label for="email" class="form-label">Почта</label>
                            <input type="email" class="form-control" id="email" placeholder="you@example.com">
                            <div class="invalid-feedback">
                                Проверьте почту
                            </div>
                        </div>

                        <div class="col-12">
                            <label for="country" class="form-label">Должность</label>
                            <select name="department_id" class="form-select" id="department" required="">
                                @foreach($departments as $department)
                                    <option value="{{ $department->id }}">{{ $department->name }}</option>
                                @endforeach
                            </select>
                            <div class="invalid-feedback">
                                Выбери должность
                            </div>
                        </div>

                        {{Form::file('image')}}

                        <div class="col-12">
                            <label for="floatingPassword" class="form-label">Пароль</label>
                            <input id="password" type="password" class="form-control" name="password" >
                            <div class="invalid-feedback">
                                Говно пароль
                            </div>
                        </div>
                    </div>

                    <hr class="my-4">

                    <button class="btn w-100" style="background-color: #FF5108; color:white" type="submit">Создать пользователя</button>
                </form>
            </div>
        </div>
    </main>
</div>
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
</html>
