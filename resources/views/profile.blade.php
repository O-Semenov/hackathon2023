
<?php
$user = \Illuminate\Support\Facades\Auth::user();
$auth = \Illuminate\Support\Facades\Auth::check();
?>


@extends('layouts.main')

@section('title')Пользователь@endsection

@section('head')



@endsection


@section('body')

    <div class="space"></div>
    <div class="space"></div>

    <div class="container">
        <div class="row">
            <div class="col-md-3 pt-5 col-lg-4">
                @if($user_selected->img == null)
                    <img class="img-thumbnail" src="https://sun9-77.userapi.com/impg/3Z7R7ouJMMe6XY0Tum6mA4k-fa9fOWTvnxkTag/AnKuFaCppJg.jpg?size=626x626&quality=96&sign=72142bf9e93b1bf2097dc0627498e1fa&type=album" alt="" />
                @else
                    <img class="img-thumbnail" src="{{asset('storage'). '/' . $user_selected->img}}" alt="" class="account-profile" alt="">
                @endif
            </div>
            <div class="col-md-2 col-lg-3">
                <h5 class="mb-4 p-5">Профиль
                    @if($user->role < $user_selected->role || $user->id == $user_selected->id)
                    <a href="/user/edit/{{ $user_selected->id }}" style="margin-left: 20px; font-size: 10pt">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-fill" viewBox="0 0 16 16">
                            <path d="M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708l-3-3zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207l6.5-6.5zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.499.499 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11l.178-.178z"/>
                        </svg>
                        Редактировать
                    </a>
                    @endif
                </h5>

                <div class="row g-5"></div>
                <div class="row g-3">
                    <div class="col-12">
                        <label class="form-label">Имя: </label>
                        {{ $user_selected->name }}
                    </div>

                    <div class="col-12">
                        <label class="form-label">Фамилия: </label>
                        {{ $user_selected->surname }}
                    </div>

                    <div class="col-12">
                        <label class="form-label">Отчество: </label>
                        {{ $user_selected->patronymic }}
                    </div>

                    <div class="col-12">
                        <label class="form-label">Должность: </label>
                        {{ $department }}
                    </div>

                    <div class="col-12">
                        <label class="form-label">Уровень доступа: </label>
                        @if($user_selected->role == 0)
                            Администратор
                        @elseif($user->role = 1)
                            Уровень 1
                        @else
                            Уровень 2
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="space"></div>
    <div class="space"></div>
    <div class="space"></div>
    <div class="space"></div>
    <div class="space"></div>

@endsection
