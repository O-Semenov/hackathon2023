
@extends('layouts.main')

@section('title')Ошибка@endsection

@section('head')

    <link rel="stylesheet" type="text/css" href="{{ asset('css/message-page.css') }}">

@endsection


@section('body')

    <div class="content">

        <div class="card">
            <img class="cat" src="{{ asset('img/432434.png') }}">
            <span class="text">У вас недостаточно прав</span>
            <br>
            <a class="ref-main" href="/">Главная</a>
        </div>

    </div>

    <div class="space"></div>

@endsection
