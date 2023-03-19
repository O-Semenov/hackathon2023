
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
    <title>Сообщения</title>

    <link rel="stylesheet" type="text/css" href="{{ asset('css/messanger/messanger.css') }}">
</head>
<body>




<div class="app">
    <div class="header">
        <div class="user-settings">
            @if($user->img != null)
                <img class="user-profile" src="{{asset('storage'). '/' . $user->img}}" alt="" class="account-profile" alt="">
            @else
                <img class="user-profile" src="https://sun9-77.userapi.com/impg/3Z7R7ouJMMe6XY0Tum6mA4k-fa9fOWTvnxkTag/AnKuFaCppJg.jpg?size=626x626&quality=96&sign=72142bf9e93b1bf2097dc0627498e1fa&type=album" alt="" />
            @endif
            <span></span>
            {{ $user->surname . ' ' . $user->name }}
        </div>
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
                            <div class="chat-msg-text">{{ $message->message }}</div>
                        </div>
                    </div>
                @endforeach

            </div>
            <div class="chat-area-footer">

                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="feather feather-paperclip">
                    <path d="M21.44 11.05l-9.19 9.19a6 6 0 01-8.49-8.49l9.19-9.19a4 4 0 015.66 5.66l-9.2 9.19a2 2 0 01-2.83-2.83l8.49-8.48" /></svg>
                <input type="text" id="message" onended="sendMessage()" placeholder="Сообщение..." />


                <svg onclick="sendMessage()" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-send-fill" viewBox="0 0 16 16">
                    <path d="M15.964.686a.5.5 0 0 0-.65-.65L.767 5.855H.766l-.452.18a.5.5 0 0 0-.082.887l.41.26.001.002 4.995 3.178 3.178 4.995.002.002.26.41a.5.5 0 0 0 .886-.083l6-15Zm-1.833 1.89L6.637 10.07l-.215-.338a.5.5 0 0 0-.154-.154l-.338-.215 7.494-7.494 1.178-.471-.47 1.178Z"/>
                </svg>

            </div>
        </div>
        @endif

    </div>
</div>





<script>
    let user_id = {{ $user->id }}
</script>




@if($chat)


<script>

    async function postData(message) {
        const xhr = new XMLHttpRequest();
        var params = 'message=' + message
        xhr.open('GET', '/api/send-message/{{ $chat_id }}?' + params);
        //xhr.setRequestHeader("Content-Type", "application/json; charset=UTF-8");
        xhr.onreadystatechange = function() {
            if (this.readyState !== 4) return;
            console.log(xhr.responseText)
        }
        xhr.send();
    }


    let message = document.getElementById('message')

    message.addEventListener("keypress", function(event) {
        if (event.key === "Enter") {
            sendMessage()
        }
    })

    async function sendMessage() {
        await postData(message.value);
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
        messagesBox.innerHTML += '<div class="chat-msg ' + ( message['user_id'] === user_id ? 'owner' : '' ) +'"> <div class="chat-msg-content"> <div class="chat-msg-text">' + message['message'] + '</div> </div> </div>'
    }

    function getNewMessages(){
        let url = '/api/get-new-chat-messages/{{ $chat_id }}'
        let messages = JSON.parse(httpGet(url))
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

</body>
</html>
