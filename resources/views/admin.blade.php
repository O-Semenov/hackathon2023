
@extends('layouts.main')

@section('title')Админка@endsection

@section('head')



@endsection


@section('body')


    <div class="container" style="margin-bottom: 150px">
        <main>
            <div class="row">
                <div class="col-md-3 col-lg-4">
                </div>
                <div class="col-md-2 col-lg-3">
                    <h5 class="mb-4 p-5">Создать пользователя</h5>
                    <form method="POST" class="needs-validation" autocomplete="off" action="/register" enctype="multipart/form-data">
                        @csrf
                        <div class="row g-5">

                        </div>
                        <div class="row g-3">
                            <div class="col-12">
                                <label for="firstName" class="form-label">Имя</label>
                                <input name="name" type="text" class="form-control" id="name" placeholder="" value="" required="">
                            </div>

                            <div class="col-12">
                                <label for="lastName" class="form-label">Фамилия</label>
                                <input name="surname" type="text" class="form-control" id="surname" placeholder="" value="" required="">
                            </div>

                            <div class="col-12">
                                <label for="lastName" class="form-label">Отчество</label>
                                <input name="patronymic" type="text" class="form-control" id="patronymic" placeholder="" value="" required="">
                            </div>

                            <div class="col-12">
                                <label for="email" class="form-label">Почта</label>
                                <input name="email" type="email" class="form-control" id="email" placeholder="you@example.com">
                                <div class="invalid-feedback">
                                    Проверьте почту
                                </div>
                            </div>

                            <div class="col-12">
                                <label for="country" class="form-label">Должность</label>
                                <select name="department_id" class="form-select" id="department" required="">
                                    @foreach($departments as $department)
                                        <option value="{{ $department->id }}">{{ $department->name }}</option>
                                    @endforeach
                                </select>
                                <div class="invalid-feedback">
                                    Выбери должность
                                </div>
                            </div>

                            {{Form::file('image')}}

                            <div class="col-12">
                                <label for="floatingPassword" class="form-label">Пароль</label>
                                <input name="password" id="password" type="password" class="form-control" name="password" >
                                <div class="invalid-feedback">
                                    Говно пароль
                                </div>
                            </div>
                        </div>

                        <hr class="my-4">

                        <button class="btn w-100" style="background-color: #FF5108; color:white" type="submit">Создать пользователя</button>
                    </form>
                </div>
            </div>
        </main>
    </div>


@endsection
