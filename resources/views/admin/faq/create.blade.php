@extends('layouts.admin')

@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Добавить вопрос</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('main') }}">Главная</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('faq.index') }}">Список вопросов</a></li>
                    <li class="breadcrumb-item active">Добавить вопрос</li>
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
                    <h3 class="card-title">Добавить вопрос</h3>
                    <a href="{{ route('faq.index') }}" class="btn btn-primary btn-sm">Вернуться к списку
                        вопросов</a>
                </div>
            </div>

            <div class="card-body p-0">
                <div class="card card-primary shadow-none">

                    <form action="{{ route('faq.store') }}" method="POST">
                        @csrf
                        <div class="card-body">
                            @include('includes.errors')
                            <div class="form-group">
                                <label for="question">Вопрос</label>
                                <input type="text" name="question" class="form-control" id="question" placeholder="Вопрос" value="{{ old('question') }}">
                            </div>
                            <div class="form-group">
                                <label for="description">Ответ</label>
                                <textarea class="form-control" id="question" rows="4" name="answer" placeholder="Ответ">{{ old('answer') }}</textarea>
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

@section('style')
    <link rel="stylesheet" href="{{ asset('admin') }}/css/summernote.min.css">
@endsection
@section('script')
    <script src="{{ asset('admin') }}/js/summernote.min.js"></script>
    <script>
        $('#description').summernote({
            placeholder: 'Привет, мир!',
            tabsize: 2,
            height: 300
        });
    </script>
@endsection
