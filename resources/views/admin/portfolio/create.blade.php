@extends('layouts.admin')

@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Добавить пост</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('main') }}">Главная</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('post.index') }}">Список постов</a></li>
                    <li class="breadcrumb-item active">Добавить пост</li>
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
                    <h3 class="card-title">Добавить пост</h3>
                    <a href="{{ route('portfolio.index') }}" class="btn btn-primary btn-sm">Вернуться к списку
                        работ</a>
                </div>
            </div>

            <div class="card-body p-0">
                <div class="card card-primary shadow-none">

                    <form action="{{ route('portfolio.store') }}" method="POST" enctype = "multipart/form-data">
                        @csrf
                        <div class="card-body">
                            @include('includes.errors')
                            <div class="form-group">
                                <label for="title">Заголовок поста</label>
                                <input type="text" name="title" class="form-control" id="title" placeholder="Заголовок поста" value="{{ old('title') }}">
                            </div>
                            <div class="form-group">
                                <label for="title">Категория поста</label>
                                <select name="category_id" id="category" class="form-control" {{ old('category_id') }}>
                                    <option value="" selected style="display: none;">Выберите категорию</option>
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <!-- <label for="customFile">Custom File</label> -->
                                <div class="custom-file">
                                  <input type="file" name="image" class="custom-file-input" id="image">
                                  <label class="custom-file-label" for="image" value="{{ old('image') }}">Выберите изображение</label>
                                </div>
                              </div>
                            <div class="form-group">
                                <label for="description">Описание поста</label>
                                <textarea class="form-control" id="description" rows="4" name="description" placeholder="Описание">{{ old('description') }}</textarea>
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
