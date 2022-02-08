@extends('layouts.admin')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Список работ</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('main') }}">Главная</a></li>
              <li class="breadcrumb-item active">Список работ</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <div class="content">
      <div class="container-fluid">
        <div class="card">
            <div class="card-header">
                <div class="d-flex justify-content-between align-items-center">
                <h3 class="card-title">Список работ</h3>
                <a href="{{ route('portfolio.create') }}" class="btn btn-primary btn-sm">Добавить работу</a>
                </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body p-0">
            <table class="table table-striped text-center" >
                <thead>
                <tr>
                    <th style="width: 10px">#</th>
                    <th>Изображение</th>
                    <th>Заголовок</th>
                    <th>Категория</th>
                    <th>Действия</th>
                </tr>
                </thead>
                <tbody >
                @foreach ($posts as $post)
                    <tr>
                        <td>{{ $post -> id}}</td>
                        <td>
                            <div style="max-width:70px;max-height:70px;overflow:hidden;margin:0 auto;">
                                <img src="{{ asset($post->image) }}" alt="изображение поста" class="img-fluid">
                            </div>
                            {{ $post -> name}}
                        </td>
                        <td>{{ $post -> title}}</td>
                        <td>{{ $post -> category->name}}</td>
                        <td>
                            <a href="{{ route('portfolio.edit', [$post->id]) }}" class="btn btn-primary btn-sm mr-1"><i class="fas fa-edit"></i></a>
                            <form action="{{ route('portfolio.destroy', [$post->id]) }}" class="mr-1 d-inline-block" method="POST">
                                @method('DELETE')
                                @csrf
                                <button type="submit" class="btn btn-danger btn-sm "><i class="fas fa-trash"></i></button>
                            </form>
                            <a href="{{  route('portfolio.single',['slug' => $post->slug])  }}" class="btn btn-success btn-sm mr-1"><i class="fas fa-eye"></i></a>
                        </td>
                    </tr>
                @endforeach


                </tbody>
            </table>
            </div>
            <!-- /.card-body -->
        </div>
         @if($posts->hasPages())
        <div class="col-sm-12 col-md-7 mt-3">
            <div class="dataTables_paginate paging_simple_numbers" id="users_paginate">
                <ul class="pagination">
                    <li class="paginate_button page-item previous {{ ($posts->currentPage() === 1) ? 'disabled' : '' }}" id="users_previous"><a
                            href="{{ $posts->previousPageUrl() }}" aria-controls="users" data-dt-idx="0" tabindex="0"
                            class="page-link">Предыдущая страница</a>
                    </li>
                    @foreach($posts->links()->elements['0'] as $elem => $value)
                      <li class="paginate_button page-item {{ ($posts->currentPage() === $elem) ? 'active' : '' }}"><a href="{{ $value }}" aria-controls="users" data-dt-idx="{{ $elem }}"
                            tabindex="0" class="page-link">{{ $elem }}</a></li>
                    @endforeach
                    <li class="paginate_button page-item next {{ ($posts->currentPage() === $posts->lastPage()) ? 'disabled' : '' }}" id="users_next"><a href="{{ $posts->nextPageUrl() }}" aria-controls="users"
                            data-dt-idx="7" tabindex="0" class="page-link">Следующая страница</a></li>
                </ul>
            </div>
        </div>
        @endif
      </div><!-- /.container-fluid -->

    </div>




  @endsection
