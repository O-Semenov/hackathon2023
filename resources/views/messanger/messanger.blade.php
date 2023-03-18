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
    <a href="/messanger/user/{{ $user->id }}">{{ $user->surname }} {{ mb_substr($user->name, 0, 1) }}. {{ mb_substr($user->patronymic, 0, 1) }}.</a>
    <br>
@endforeach

<br>
<a href="/">Главная</a>

<br><br><br>

@if($chat)

    <div id="messages">
        @foreach($messages as $message)
            {{ $message->message }} <br>
        @endforeach
    </div>

    <input type="text" id="message" onended="sendMessage()">
    <button onclick="sendMessage()">Отправить</button>


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
    let messagesBox = document.getElementById('messages')

    window.onload = function (){
        loop()
    }

    function httpGet(theUrl)
    {
        var xmlHttp = new XMLHttpRequest();
        xmlHttp.open( "GET", theUrl, false ); // false for synchronous request
        xmlHttp.send( null );
        return xmlHttp.responseText;
    }

    function getNewMessages(){
        let url = '/api/get-new-chat-messages/{{ $chat_id }}'
        let messages = JSON.parse(httpGet(url))
        for (let i=0; i<messages.length; i++){
            //alert(messages[i]['message'])
            let message = document.createElement('span')
            message.appendChild(document.createTextNode(messages[i]['message']))
            messagesBox.appendChild(message)
            messagesBox.appendChild(document.createElement('br'))
        }
        console.log(messages)
    }

    function loop(){
        //console.log('!!!')

        getNewMessages()

        setTimeout(() => { loop() }, 1000)
    }
</script>

@endif

</body>
</html>
