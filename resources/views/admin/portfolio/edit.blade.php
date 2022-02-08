@extends('layouts.admin')

@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Отредактировать пост</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('main') }}">Главная</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('portfolio.index') }}">Список постов</a></li>
                    <li class="breadcrumb-item active">Отредактировать пост</li>
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
                    <h3 class="card-title">Отредактировать пост &laquo;{{ $post->title }}&raquo;</h3>
                    <a href="{{ route('portfolio.index') }}" class="btn btn-primary btn-sm">Вернуться к списку
                        постов</a>
                </div>
            </div>
            <div class="card-body p-0">
                <div class="card card-primary shadow-none">

                    <form action="{{ route('portfolio.update',[$post->id]) }}" method="POST" enctype = "multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="card-body">
                            @include('includes.errors')
                            <div class="form-group">
                                <label for="title">Заголовок поста</label>
                                <input type="text" name="title" class="form-control" id="title" placeholder="Заголовок поста" value="{{ $post-> title }}">
                            </div>
                            <div class="form-group">
                                <label for="title">Категория поста</label>
                                <select name="category_id" id="category" class="form-control">
                                    <option value="" selected style="display: none;">Выберите категорию</option>
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}" @if ($post->category_id === $category->id)
                                            selected
                                        @endif>{{ $category->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-8">
                                        <div class="custom-file">
                                            <input type="file" name="image" class="custom-file-input" id="image">
                                            <label class="custom-file-label" for="image" value="{{ old('image') }}">Выберите изображение</label>
                                          </div>
                                    </div>
                                    <div class="col-4">
                                        <div style="max-width:70px;max-height:70px;overflow:hidden;">
                                            <img src="{{ asset($post->image) }}" alt="изображение поста" class="img-fluid">
                                        </div>
                                    </div>
                                </div>

                              </div>
                            <div class="form-group">
                                <label for="description">Описание поста</label>
                                <textarea class="form-control" id="description" rows="4" name="description" placeholder="Описание">{{ $post->description }}</textarea>
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
