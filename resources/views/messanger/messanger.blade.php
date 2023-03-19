
<?php

$user = \Illuminate\Support\Facades\Auth::user();
$auth = \Illuminate\Support\Facades\Auth::check();

?>


@extends('layouts.main')

@section('title')Сообщения@endsection

@section('head')

    <script
        src="https://code.jquery.com/jquery-3.6.4.slim.js"
        integrity="sha256-dWvV84T6BhzO4vG6gWhsWVKVoa4lVmLnpBOZh/CAHU4="
        crossorigin="anonymous"></script>

    <link rel="stylesheet" type="text/css" href="{{ asset('css/messanger/messanger.css') }}">

@endsection


@section('body')

    <div class="app">
        <div class="header">

            <div class="search-bar">
                <input type="text" placeholder="Search..." />
            </div>
        </div>
        <div class="wrapper">
            <div class="conversation-area">
                @foreach($users as $user_i)
                    <a href="/messanger/user/{{ $user_i->id }}" class="chat-link">
                        <div class="msg @if($chat && $user_i->id == $user_selected->id) active @endif">
                            @if($user_i->img != null)
                                <img class="msg-profile" src="{{asset('storage'). '/' . $user_i->img}}" alt="" />
                            @else
                                <img class="msg-profile" src="https://sun9-77.userapi.com/impg/3Z7R7ouJMMe6XY0Tum6mA4k-fa9fOWTvnxkTag/AnKuFaCppJg.jpg?size=626x626&quality=96&sign=72142bf9e93b1bf2097dc0627498e1fa&type=album" alt="" />
                            @endif
                            <div class="msg-detail">
                                <div class="msg-username">{{ $user_i->surname }} {{ $user_i->name }}</div>
                                <div class="msg-content">
                                    <span class="msg-message"></span>
                                </div>
                            </div>

                        </div>
                    </a>
                @endforeach

                <div class="overlay"></div>
            </div>
            @if($chat)

                <div class="chat-area" id="chat-area">
                    <div class="chat-area-header">
                        <div class="chat-area-title">
                            @if($user_selected->role >= $user->role)
                                <a href="/user/{{ $user_selected->id }}">
                                    {{ $user_selected->surname . ' ' . $user_selected->name }}
                                </a>
                            @else
                                {{ $user_selected->surname . ' ' . $user_selected->name }}
                            @endif
                        </div>
                    </div>
                    <div class="chat-area-main" id="message-box">

                        @foreach($messages as $message)
                            <div class="chat-msg @if($message->user_id == $user->id) owner @endif">
                                <div class="chat-msg-content">
                                    <div class="chat-msg-text">
                                        {{ $message->message }}

                                        @if($message->uri != null)
                                            <br>
                                            @if($message->type == 1)
                                                <img src="{{asset('storage'). '/' . $message->uri}}" />
                                            @else
                                                <a href="{{asset('storage'). '/' . $message->uri}}">
                                                    <img src="{{asset('img/file.png') }}" />
                                                    <br><br>
                                                    <center>
                                                        <?php
                                                        $exployd = explode('/', $message->uri)[1];
                                                        $exployd = explode('_', $exployd);
                                                        $format = explode('.', end($exployd))[1];
                                                        $name = '';
                                                        for ($i=0; $i<count($exployd) - 1; $i++){
                                                            $name .= $exployd[$i];
                                                            if ($i > 0){
                                                                $name .= '_';
                                                            }
                                                        }
                                                        $name .= '.' . $format;
                                                        ?>
                                                        {{ $name }}
                                                    </center>
                                                </a>
                                            @endif
                                        @endif
                                    </div>

                                </div>
                            </div>
                        @endforeach

                    </div>
                    <div class="chat-area-footer">

                        <form class="chat-area-footer" method="POST" autocomplete="off" action="/api/send-message/{{ $chat_id }}" enctype="multipart/form-data">
                            @csrf

                            @if($user->role <= $user_selected->role)
                                <label class="input-file">
                                    <input name="file" type="file" class="file-select" id="file-select">
                                    <span class="input-file-btn">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="feather feather-paperclip">
     <path d="M21.44 11.05l-9.19 9.19a6 6 0 01-8.49-8.49l9.19-9.19a4 4 0 015.66 5.66l-9.2 9.19a2 2 0 01-2.83-2.83l8.49-8.48" /></svg>
                    </span>
                                    <span class="input-file-text"></span>
                                </label>

                            @endif

                            <input onpaste="pasteLink(event)" type="text" id="message" name="message" placeholder="Сообщение..." />



                            <button type="submit" class="send-btn">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-send-fill" viewBox="0 0 16 16">
                                    <path d="M15.964.686a.5.5 0 0 0-.65-.65L.767 5.855H.766l-.452.18a.5.5 0 0 0-.082.887l.41.26.001.002 4.995 3.178 3.178 4.995.002.002.26.41a.5.5 0 0 0 .886-.083l6-15Zm-1.833 1.89L6.637 10.07l-.215-.338a.5.5 0 0 0-.154-.154l-.338-.215 7.494-7.494 1.178-.471-.47 1.178Z"/>
                                </svg>
                            </button>


                        </form>

                    </div>
                </div>
            @endif

        </div>
    </div>





    <script>
        let user_id = {{ $user->id }}

        $('.input-file input[type=file]').on('change', function(){
            let file = this.files[0];
            $(this).closest('.input-file').find('.input-file-text').html(file.name);
        });

        function isURL(str) {
            try {
                new URL(str);
                return true;
            } catch {
                return false;
            }
        }

        function pasteLink(event){
            let inputData = event.target.value
            navigator.clipboard.readText()
                .then(text => {
                    if (isURL(text)){
                        let result = confirm("ССылка на другой сайт. Вы уверены, что хотите её вставить?");
                        if (!result){
                            event.target.value = inputData
                        }
                    }
                })
                .catch(err => {
                    // возможно, пользователь не дал разрешение на чтение данных из буфера обмена
                    event.target.value = inputData
                })
        }
    </script>




    @if($chat)


        <script>

            function postData(url, message) {
                var data = new FormData();
                data.append('message', message);

                var xhr = new XMLHttpRequest();
                xhr.open('POST', url, true);
                xhr.onload = function () {
                    // do something to response
                    console.log(this.responseText);
                };
                xhr.send(data);
            }


            let message = document.getElementById('message')

            function sendMessage() {
                let url = '/api/send-message/{{ $chat_id }}'
                postData(url, message.value);
                message.value = ''
            }

        </script>


        <script>
            let messagesBox = document.getElementById('message-box')
            let chatArea = document.getElementById('chat-area')

            window.onload = function (){
                chatArea.scrollTop = messagesBox.scrollHeight
                loop()
            }

            function httpGet(theUrl)
            {
                var xmlHttp = new XMLHttpRequest();
                xmlHttp.open( "GET", theUrl, false ); // false for synchronous request
                xmlHttp.send( null );
                return xmlHttp.responseText;
            }

            function addMessageItem(message){

                let messageItem = '<div class="chat-msg ' + ( message['user_id'] === user_id ? 'owner' : '' ) +'">'
                    +'<div class="chat-msg-content">'
                    +'<div class="chat-msg-text">'
                    + message['message']

                    +''
                    +'<br>'
                    +''
                    +'<img src="" />'
                    +''
                    +'<a href="">'
                    +'<img src="" />'
                    +'</a>'
                    +''
                    +''

                if (message['uri'] !== null){
                    //messageItem += '<br>'
                    if (message['type'] == 1){
                        messageItem += '<img src="/storage/' + message['uri'] + '" />'
                    }else{
                        messageItem += '<a href="/storage/' + message['uri'] + '">'
                            +'<img src="/img/file.png" />'
                            +'</a>'
                    }
                }

                messageItem += '</div>' + '</div>' + '</div>'

                messagesBox.innerHTML += messageItem;
                //messagesBox.innerHTML += '<div class="chat-msg ' + ( message['user_id'] === user_id ? 'owner' : '' ) +'"> <div class="chat-msg-content"> <div class="chat-msg-text">' + message['message'] + '</div> </div> </div>'
            }

            function getNewMessages(){
                let url = '/api/get-new-chat-messages/{{ $chat_id }}'
                let messages = JSON.parse(httpGet(url))
                //let messages = httpGet(url)
                //console.log(messages)
                for (let i=0; i<messages.length; i++){
                    addMessageItem(messages[i])
                }
                if (messages.length > 0){
                    chatArea.scrollTop = messagesBox.scrollHeight
                }
            }

            function loop(){

                getNewMessages()

                setTimeout(() => { loop() }, 1000)
            }
        </script>

    @endif

    <div class="space"></div>
    <div class="space"></div>
    <div class="space"></div>

@endsection
