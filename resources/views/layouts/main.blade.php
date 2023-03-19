<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>

    <link rel="stylesheet" type="text/css" href="{{ asset('css/layout/main_layout.css') }}">

    @yield('head')
</head>
<body>

<div class="head">

</div>

<div class="block"></div>

@yield('body')


<div class="footer">
    <div class="footer-content">
        <div class="footer-item">
            © 2023
        </div>
        <div class="footer-item">
            <a href="tel:84955405179">+7 876 902-14-23</a>
        </div>
        <div class="footer-item">
            <a href="mailto:info@webpractik.ru">info@webpractic.ru</a>
        </div>
        <div class="footer-item">
            <center>
                <a href="/WebpractikPolicy.pdf">
                    Политика отношений в обработки<br>персональных данных
                </a>
            </center>
        </div>
    </div>
</div>

</body>
</html>
