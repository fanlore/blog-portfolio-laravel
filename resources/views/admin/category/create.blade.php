@extends('layouts.admin')

@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Добавить категорию</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('main') }}">Главная</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('category.index') }}">Список категорий</a></li>
                    <li class="breadcrumb-item active">Добавить категорию</li>
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
                    <h3 class="card-title">Добавить категорию</h3>
                    <a href="{{ route('category.index') }}" class="btn btn-primary btn-sm">Вернуться к списку
                        категорий</a>
                </div>
            </div>

            <div class="card-body p-0">
                <div class="card card-primary shadow-none">

                    <form action="{{ route('category.store') }}" method="POST">
                        @csrf
                        <div class="card-body">
                            @include('includes.errors')
                            <div class="form-group">
                                <label for="name">Название категории</label>
                                <input type="text" name="name" class="form-control" id="name" placeholder="Название">
                            </div>
                            <div class="form-group">
                                <label for="description">Описание категории</label>
                                <textarea class="form-control" id="description" rows="4" name="description" placeholder="Описание"></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary">Добавить</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>

</div>




@endsection
