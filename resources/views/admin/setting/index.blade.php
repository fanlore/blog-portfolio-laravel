@extends('layouts.admin')

@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Настройки</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('main') }}">Главная</a></li>
                    <li class="breadcrumb-item active">Настройки лендинга</li>
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
                    <h3 class="card-title">Настройки</h3>
                </div>
            </div>

            <div class="card-body p-0">
                <div class="card card-primary shadow-none">

                    <form action="{{ route('setting.update') }}" method="POST">
                        @csrf
                        <div class="card-body">
                            @include('includes.errors')
                            <div class="form-group">
                                <label for="title">Заголовок</label>
                                <input type="text" name="title" class="form-control" id="title" placeholder="Заголовок" value="{{ $settings->title}}">
                            </div>
                            <div class="form-group">
                                <label for="subtitle">Подзаголовок</label>
                                <input type="text" name="subtitle" class="form-control" id="subtitle" placeholder="Заголовок" value="{{ $settings->subtitle}}">
                            </div>
                            <div class="form-group">
                                <label for="description">Описание категории</label>
                                <textarea class="form-control" id="description" rows="4" name="description" placeholder="Описание">{{ $settings->description}}</textarea>
                            </div>
                            <button type="submit" class="btn btn-primary">Применить</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>

</div>




@endsection
