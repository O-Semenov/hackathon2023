




@extends('layouts.main')

@section('title')Админка@endsection

@section('head')



@endsection


@section('body')

    <div class="space"></div>


    <div class="container" style="margin-bottom: 150px">
        <main>
            <div class="row">
                <div class="col-md-3 col-lg-4">
                </div>
                <div class="col-md-2 col-lg-3">
                    <center>
                        <h5 class="mb-4 p-5">Редактирование пользователя</h5>
                    </center>

                    <form method="POST" autocomplete="off" action="/user_edit/{{ $user->id }}" class="needs-validation" enctype="multipart/form-data">
                        @csrf
                        <div class="row g-5">

                        </div>
                        <div class="row g-3">
                            <div class="col-12">
                                <label for="firstName" class="form-label">Имя</label>
                                <input name="name" type="text" class="form-control" id="name" placeholder="" value="{{ $user->name }}" required="">
                            </div>

                            <div class="col-12">
                                <label for="lastName" class="form-label">Фамилия</label>
                                <input name="surname" type="text" class="form-control" id="surname" placeholder="" value="{{ $user->surname }}" required="">
                            </div>

                            <div class="col-12">
                                <label for="lastName" class="form-label">Отчество</label>
                                <input name="patronymic" type="text" class="form-control" id="patronymic" placeholder="" value="{{ $user->patronymic }}" required="">
                            </div>

                            <div class="col-12">
                                <label for="email" class="form-label">Почта</label>
                                <input name="email" type="email" class="form-control" id="email" placeholder="you@example.com" value="{{ $user->email }}">
                                <div class="invalid-feedback">
                                    Проверьте почту
                                </div>
                            </div>

                            <div class="col-12">
                                <label for="country" class="form-label">Должность</label>
                                <select name="department_id" class="form-select" id="department" required="">
                                    @foreach($departments as $department)
                                        <option value="{{ $department->id }}" @if($user->department_id == $department->id)selected @endif>{{ $department->name }}</option>
                                    @endforeach
                                </select>
                                <div class="invalid-feedback">
                                    Выбери должность
                                </div>
                            </div>

                            <div class="col-12">
                                <label for="country" class="form-label">Уровень доступа</label>
                                <select name="role" id="role" class="form-select" required="">
                                    <option value="1" @if($user->role == 1)selected @endif>Уровень доступа 1</option>
                                    <option value="2" @if($user->role == 2)selected @endif>Уровень доступа 2</option>
                                </select>
                                <div class="invalid-feedback">
                                    Уровень доступа
                                </div>
                            </div>

                            {{Form::file('image')}}
                        </div>

                        <hr class="my-4">

                        <button class="btn w-100" style="background-color: #FF5108; color:white" type="submit">Сохранить изменения</button>
                    </form>
                </div>
            </div>
        </main>
    </div>

    <div class="space"></div>

@endsection
