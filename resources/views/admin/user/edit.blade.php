@extends('layouts.admin')

@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Отредактировать данные пользователя</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('main') }}">Главная</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('user.index') }}">Список пользователей</a></li>
                    <li class="breadcrumb-item active">Отредактировать пользователя</li>
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
                    <h3 class="card-title">Отредактировать пользователя &laquo;{{ $user->name }}&raquo;</h3>
                    <a href="{{ route('user.index') }}" class="btn btn-primary btn-sm">Вернуться к списку
                        пользователей</a>
                </div>
            </div>

            <div class="card-body p-0">
                <div class="card card-primary shadow-none">

                    <form action="{{ route('user.update', [$user -> id]) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="card-body">
                            @include('includes.errors')
                             <div class="form-group">
                                <label for="name">Имя пользователя</label>
                                <input type="text" name="name" class="form-control" id="name" placeholder="Имя" value="{{ $user->name }}">
                            </div>
                            <div class="form-group">
                                <label for="email">Электронная почта</label>
                                <input type="email" name="email" class="form-control" id="email" placeholder="Почта" value="{{ $user->email }}">
                            </div>
                            <div class="form-group">
                                <label for="password">Пароль</label>
                                <input type="password" name="password" class="form-control" id="password" placeholder="Пароль">
                            </div>
                            <div class="form-group">
                                <select name="role" id="role" class="form-control">
                                    <option value="user" selected style="display: none;">Выберите роль пользователя</option>
                                    <option value="user">Пользователь</option>
                                    <option value="admin">Администратор</option>
                                </select>
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
