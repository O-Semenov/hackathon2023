
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
    <script src="{{ asset("js/app.js") }}"></script>
    <script src="{{ asset("js/bootstrap.js") }}"></script>
    <link rel="stylesheet" class="cp-pen-styles" href="{{ asset("css/app.css") }}">
    <link rel='stylesheet prefetch' href='https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css'>
    <link rel='stylesheet prefetch' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.2/css/font-awesome.min.css'>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
@if($auth)

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

<div class="container">
<div id="frame" class="row">
    <div id="sidepanel" class="col">
        <div id="profile" class="">
            <div class="wrap">
                <img id="profile-img" src="
                @if (isset($user->img))
                    {{asset('storage'). '/' . $user->img}}
                @else
                https://media.istockphoto.com/id/1214284142/ru/%D0%B2%D0%B5%D0%BA%D1%82%D0%BE%D1%80%D0%BD%D0%B0%D1%8F/%D0%B0%D0%BD%D0%BE%D0%BD%D0%B8%D0%BC%D0%BD%D1%8B%D0%B9-%D0%B6%D0%B5%D0%BD%D1%81%D0%BA%D0%B8%D0%B9-%D0%B0%D0%B2%D0%B0%D1%82%D0%B0%D1%80-%D0%BB%D0%B8%D1%86%D0%B0-%D0%B8%D0%BD%D0%BA%D0%BE%D0%B3%D0%BD%D0%B8%D1%82%D0%BE-%D0%B6%D0%B5%D0%BD%D1%89%D0%B8%D0%BD%D0%B0-%D0%B3%D0%BE%D0%BB%D0%BE%D0%B2%D1%83-%D1%81%D0%B8%D0%BB%D1%83%D1%8D%D1%82.jpg?s=170667a&w=0&k=20&c=izcqDj8AJy7eeYGQtdjGuEDp8Chu651tSBKFWbpwPRk=
                @endif
                " class="online" alt="" />
                <p>{{ $user->surname }} {{ mb_substr($user->name, 0, 1) }}. {{ mb_substr($user->patronymic, 0, 1) }}.</p>
                <i class="fa fa-chevron-down expand-button" aria-hidden="true"></i>
                <div id="status-options">
                    <ul>
                        <li id="status-online" class="active"><span class="status-circle"></span> <p>Online</p></li>
                        <li id="status-away"><span class="status-circle"></span> <p>Away</p></li>
                        <li id="status-busy"><span class="status-circle"></span> <p>Busy</p></li>
                        <li id="status-offline"><span class="status-circle"></span> <p>Offline</p></li>
                    </ul>
                </div>
                <div id="expanded">
                    <label for="twitter"><i class="" aria-hidden="true">
                            @if ($user->role == 0)
                                Администратор
                            @elseif ($user->role == 1)
                                Директор
                            @elseif ($user->role == 2)
                                Сотрудник
                            @endif
                        </i></label>
                    <label for="twitter"><i class="" aria-hidden="true"> Отдел: {{ $department->name }}</i></label>
                </div>
            </div>
        </div>
        <div id="search">
            <label for=""><i class="fa fa-search" aria-hidden="true"></i></label>
            <input type="text" placeholder="Search contacts..." />
        </div>
        <div id="contacts">
            <ul>
                <li class="contact">
                    <div class="wrap">
                        <span class="contact-status online"></span>
                        <img src="http://emilcarlsson.se/assets/louislitt.png" alt="" />
                        <div class="meta">
                            <p class="name">Louis Litt</p>
                            <p class="preview">You just got LITT up, Mike.</p>
                        </div>
                    </div>
                </li>
                <li class="contact active">
                    <div class="wrap">
                        <span class="contact-status busy"></span>
                        <img src="http://emilcarlsson.se/assets/harveyspecter.png" alt="" />
                        <div class="meta">
                            <p class="name">Harvey Specter</p>
                            <p class="preview">Wrong. You take the gun, or you pull out a bigger one. Or, you call their bluff. Or, you do any one of a hundred and forty six other things.</p>
                        </div>
                    </div>
                </li>
                <li class="contact">
                    <div class="wrap">
                        <span class="contact-status away"></span>
                        <img src="http://emilcarlsson.se/assets/rachelzane.png" alt="" />
                        <div class="meta">
                            <p class="name">Rachel Zane</p>
                            <p class="preview">I was thinking that we could have chicken tonight, sounds good?</p>
                        </div>
                    </div>
                </li>
                <li class="contact">
                    <div class="wrap">
                        <span class="contact-status online"></span>
                        <img src="http://emilcarlsson.se/assets/donnapaulsen.png" alt="" />
                        <div class="meta">
                            <p class="name">Donna Paulsen</p>
                            <p class="preview">Mike, I know everything! I'm Donna..</p>
                        </div>
                    </div>
                </li>
                <li class="contact">
                    <div class="wrap">
                        <span class="contact-status busy"></span>
                        <img src="http://emilcarlsson.se/assets/jessicapearson.png" alt="" />
                        <div class="meta">
                            <p class="name">Jessica Pearson</p>
                            <p class="preview">Have you finished the draft on the Hinsenburg deal?</p>
                        </div>
                    </div>
                </li>
                <li class="contact">
                    <div class="wrap">
                        <span class="contact-status"></span>
                        <img src="http://emilcarlsson.se/assets/haroldgunderson.png" alt="" />
                        <div class="meta">
                            <p class="name">Harold Gunderson</p>
                            <p class="preview">Thanks Mike! :)</p>
                        </div>
                    </div>
                </li>
                <li class="contact">
                    <div class="wrap">
                        <span class="contact-status"></span>
                        <img src="http://emilcarlsson.se/assets/danielhardman.png" alt="" />
                        <div class="meta">
                            <p class="name">Daniel Hardman</p>
                            <p class="preview">We'll meet again, Mike. Tell Jessica I said 'Hi'.</p>
                        </div>
                    </div>
                </li>
                <li class="contact">
                    <div class="wrap">
                        <span class="contact-status busy"></span>
                        <img src="http://emilcarlsson.se/assets/katrinabennett.png" alt="" />
                        <div class="meta">
                            <p class="name">Katrina Bennett</p>
                            <p class="preview">I've sent you the files for the Garrett trial.</p>
                        </div>
                    </div>
                </li>
                <li class="contact">
                    <div class="wrap">
                        <span class="contact-status"></span>
                        <img src="http://emilcarlsson.se/assets/charlesforstman.png" alt="" />
                        <div class="meta">
                            <p class="name">Charles Forstman</p>
                            <p class="preview">Mike, this isn't over.</p>
                        </div>
                    </div>
                </li>
                <li class="contact">
                    <div class="wrap">
                        <span class="contact-status"></span>
                        <img src="http://emilcarlsson.se/assets/jonathansidwell.png" alt="" />
                        <div class="meta">
                            <p class="name">Jonathan Sidwell</p>
                            <p class="preview"><span>You:</span> That's bullshit. This deal is solid.</p>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
    </div>
    <div class="content">
        <div class="contact-profile">
            <img src="http://emilcarlsson.se/assets/harveyspecter.png" alt="" />
            <p>Harvey Specter</p>
        </div>
        <div class="messages">
            <ul>
                <li class="sent">
                    <img src="http://emilcarlsson.se/assets/mikeross.png" alt="" />
                    <p>How the hell am I supposed to get a jury to believe you when I am not even sure that I do?!</p>
                </li>
                <li class="replies">
                    <img src="http://emilcarlsson.se/assets/harveyspecter.png" alt="" />
                    <p>When you're backed against the wall, break the god damn thing down.</p>
                </li>
                <li class="replies">
                    <img src="http://emilcarlsson.se/assets/harveyspecter.png" alt="" />
                    <p>Excuses don't win championships.</p>
                </li>
                <li class="sent">
                    <img src="http://emilcarlsson.se/assets/mikeross.png" alt="" />
                    <p>Oh yeah, did Michael Jordan tell you that?</p>
                </li>
                <li class="replies">
                    <img src="http://emilcarlsson.se/assets/harveyspecter.png" alt="" />
                    <p>No, I told him that.</p>
                </li>
                <li class="replies">
                    <img src="http://emilcarlsson.se/assets/harveyspecter.png" alt="" />
                    <p>What are your choices when someone puts a gun to your head?</p>
                </li>
                <li class="sent">
                    <img src="http://emilcarlsson.se/assets/mikeross.png" alt="" />
                    <p>What are you talking about? You do what they say or they shoot you.</p>
                </li>
                <li class="replies">
                    <img src="http://emilcarlsson.se/assets/harveyspecter.png" alt="" />
                    <p>Wrong. You take the gun, or you pull out a bigger one. Or, you call their bluff. Or, you do any one of a hundred and forty six other things.</p>
                </li>
            </ul>
        </div>
        <div class="message-input">
            <div class="wrap">
                <input type="text" placeholder="Write your message..." />
                <i class="fa fa-paperclip attachment" aria-hidden="true"></i>
                <button class="submit"><i class="fa fa-paper-plane" aria-hidden="true"></i></button>
            </div>
        </div>
    </div>
</div>
</div>
@endif
<script src='//production-assets.codepen.io/assets/common/stopExecutionOnTimeout-b2a7b3fe212eaa732349046d8416e00a9dec26eb7fd347590fbced3ab38af52e.js'></script><script src='https://code.jquery.com/jquery-2.2.4.min.js'></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script >$(".messages").animate({ scrollTop: $(document).height() }, "fast");

    $("#profile-img").click(function() {
        $("#status-options").toggleClass("active");
    });

    $(".expand-button").click(function() {
        $("#profile").toggleClass("expanded");
        $("#contacts").toggleClass("expanded");
    });

    $("#status-options ul li").click(function() {
        $("#profile-img").removeClass();
        $("#status-online").removeClass("active");
        $("#status-away").removeClass("active");
        $("#status-busy").removeClass("active");
        $("#status-offline").removeClass("active");
        $(this).addClass("active");

        if($("#status-online").hasClass("active")) {
            $("#profile-img").addClass("online");
        } else if ($("#status-away").hasClass("active")) {
            $("#profile-img").addClass("away");
        } else if ($("#status-busy").hasClass("active")) {
            $("#profile-img").addClass("busy");
        } else if ($("#status-offline").hasClass("active")) {
            $("#profile-img").addClass("offline");
        } else {
            $("#profile-img").removeClass();
        };

        $("#status-options").removeClass("active");
    });

    function newMessage() {
        message = $(".message-input input").val();
        if($.trim(message) == '') {
            return false;
        }
        $('<li class="sent"><img src="http://emilcarlsson.se/assets/mikeross.png" alt="" /><p>' + message + '</p></li>').appendTo($('.messages ul'));
        $('.message-input input').val(null);
        $('.contact.active .preview').html('<span>You: </span>' + message);
        $(".messages").animate({ scrollTop: $(document).height() }, "fast");
    };

    $('.submit').click(function() {
        newMessage();
    });

    $(window).on('keydown', function(e) {
        if (e.which == 13) {
            newMessage();
            return false;
        }
    });

</script>
</body>
<footer class="footer mt-auto py-3 bg-light">
    <div class="container">
        <span class="text-muted">Place sticky footer content here.</span>
    </div>
</footer>
</html>

