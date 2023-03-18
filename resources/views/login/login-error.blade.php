@extends('layouts.main')

@section('title')Ошибка@endsection

@section('head')

    <link rel="stylesheet" type="text/css" href="{{ asset('css/message-page.css') }}">

@endsection


@section('body')

    <div class="content">

        <img class="cat" src="{{ asset('img/432434.png') }}">
        <span class="text">Неверный логин или пароль</span>

    </div>


@endsection
