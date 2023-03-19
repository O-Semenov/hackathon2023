
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
        <div class="row gy-5">
            <div class="col-xs">
            </div>
            <div class="col-md">
                <div id="carouselExampleInterval" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active" data-bs-interval="2000">
                            <img src="https://klike.net/uploads/posts/2020-04/1586162565_2.jpg" class="d-block w-100 h-100" alt="...">
                        </div>
                        <div class="carousel-item" data-bs-interval="2000">
                            <img src="https://klike.net/uploads/posts/2020-04/1586162565_2.jpg" class="d-block w-100 h-100" alt="...">
                        </div>
                        <div class="carousel-item">
                            <img src="https://kartinkof.club/uploads/posts/2022-10/1665677079_25-kartinkof-club-p-kartinka-noch-dlya-detei-25.jpg" class="d-block w-100 h-100" alt="...">

                        </div>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleInterval"  data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Предыдущий</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleInterval"  data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Следующий</span>
                    </button>
                </div>
            </div>
            <div class="col-xs">
            </div>
            <div class="container px-4 overflow-hidden" style="padding-bottom: 150px">
                <div class="row gx-3 gy-5">
                    <div class="col">
                        <div class="p-3 round hover-effect">
                            <a class="btn btn-outline-light" data-bs-toggle="collapse" href="#firstNews" role="button" aria-expanded="false" aria-controls="collapseExample">
                                <img src="https://images.unsplash.com/photo-1569025690938-a00729c9e1f9?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1740&q=80" class="img-thumbnail" alt="...">
                                Новости в офисе
                            </a>
                        </div>
                        <div class="collapse round" id="firstNews">
                            <div class="card card-body">
                                Наша экосистема финтех-продуктов построена вокруг нашего решения для моста ликвидности — Trade Processor.

                                Он интегрирован с программным обеспечением для мониторинга данных (BBI), решением для управления капиталом (PAMM) и дополнительными инструментами, которые вместе обеспечивают комплексную платформу аналитики для брокеров любого размера. Все наши продукты полностью совместимы и требуют минимальной настройки, что экономит время и деньги брокеров.
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="p-3 round hover-effect">
                            <a class="btn btn-outline-light" data-bs-toggle="collapse" href="#secondNews" role="button" aria-expanded="false" aria-controls="collapseExample">
                                <img src="https://images.unsplash.com/photo-1488590528505-98d2b5aba04b?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1740&q=80" class="img-thumbnail" alt="...">
                                Интересное
                            </a>
                        </div>
                        <div class="collapse round" id="secondNews">
                            <div class="card card-body">
                                SEO — один из самых эффективных способов увеличения посещаемости веб-сайта, и с помощью наших услуг вы можете использовать SEO не только для увеличения трафика, но и для получения дохода.

                                С коэффициентом удержания клиентов 91%, а также оценкой рекомендаций клиентов, которая превышает средний показатель по отрасли на 254%, мы являемся надежным Digital-агентством электронной коммерции для бизнеса.    </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="p-3 round hover-effect">
                            <a class="btn btn-outline-light" data-bs-toggle="collapse" href="#thirdNews" role="button" aria-expanded="false" aria-controls="collapseExample">
                                <img src="https://plus.unsplash.com/premium_photo-1668473367234-fe8a1decd456?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1932&q=80" class="img-thumbnail" alt="...">
                                Очень интересное
                            </a>
                        </div>
                        <div class="collapse round" id="thirdNews">
                            <div class="card card-body">
                                Каждый проект в студии мы начинаем с внимательного изучения рынка и аудитории, проводим аудит конкурирующих проектов. Создание мобильных приложений и сайтов как инструмент, который приносит бизнесу измеримую пользу. Мы используем наш уникальный опыт и знания, чтобы создавать интересные и качественные продукты. Мы берем на себя полный цикл создания мобильных приложений и сайтов, от проектирования интерфейсов до разработки серверной части.
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endif

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
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</html>

