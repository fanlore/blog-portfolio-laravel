@extends('layouts.admin')

@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Добавить пользователя</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('main') }}">Главная</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('user.index') }}">Список пользователей</a></li>
                    <li class="breadcrumb-item active">Профиль пользователя</li>
                </ol>
            </div>
        </div>
    </div>
</div>

<div class="content">
    <div class="container-fluid">
        <div class="card">
            <div class="card-header">
                <div class="d-flex justify-content-between align-items-center">
                    <h3 class="card-title">Профиль пользователя {{ $user->name }} <span class="badge bg-dark" style="font-size: 0.8rem;">{{ $user->roles[0]->name }}</span></h3>
                    <a href="{{ route('user.index') }}" class="btn btn-primary btn-sm">Вернуться к списку
                        пользователей</a>
                </div>
            </div>

            <div class="card-body p-0">
                <div class="card card-primary shadow-none">

                    <form action="{{ route('user.profile.update') }}" method="POST" enctype = "multipart/form-data">
                        @csrf
                        @include('includes.errors')
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-3">
                                    <div class="card">
                                        <div class="card-body">
                                            @if (File::exists($user->image))
                                                <img src="{{ asset($user->image) }}" alt="Изображение профиля"class="img-fluid img-rounded">
                                            @endif

                                            <h5>{{ $user->name }}</h5>
                                            <p>{{ $user->email }}</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-9">
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label for="name">Имя пользователя</label>
                                                <input type="text" name="name" class="form-control" id="name"
                                                    placeholder="Имя" value="{{ $user->name }}">
                                            </div>
                                            <div class="form-group">
                                                <label for="email">Электронная почта</label>
                                                <input type="email" name="email" class="form-control" id="email"
                                                    placeholder="Почта" value="{{ $user->email }}">
                                            </div>
                                            <div class="form-group">
                                                <label for="password">Пароль</label>
                                                <input type="password" name="password" class="form-control"
                                                    id="password" placeholder="Пароль">
                                            </div>

                                        </div>
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label for="image">Изображение профиля</label>
                                                <div class="custom-file">
                                                    <input type="file" name="image" class="custom-file-input"
                                                        id="image">
                                                    <label class="custom-file-label" for="image"
                                                        value="{{ old('image') }}">Выберите изображение</label>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="description">О себе</label>
                                                <textarea class="form-control" id="description" rows="5"
                                                    name="description"
                                                    placeholder="Описание">{{ $user->description }}</textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary">Обновить</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

</div>


@endsection
