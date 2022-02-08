@extends('layouts.admin')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Список категорий</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('main') }}">Главная</a></li>
              <li class="breadcrumb-item active">Категории</li>
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
                <h3 class="card-title">Список категорий</h3>
                <a href="{{ route('category.create') }}" class="btn btn-primary btn-sm">Добавить категорию</a>
                </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body p-0">
            <table class="table table-striped text-center">
                <thead>
                <tr>
                    <th style="width: 10px">#</th>
                    <th>Категория</th>
                    <th>Слаг</th>
                    <th>Количество постов</th>
                    <th>Действия</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($categories as $category)
                    <tr>
                        <td>{{ $category -> id}}</td>
                        <td>{{ $category -> name}}</td>
                        <td>{{ $category -> slug}}</td>
                        <td>{{ $category->posts->count() }}</td>
                        <td>
                            <a href="{{ route('category.edit', [$category->id]) }}" class="btn btn-primary btn-sm mr-1"><i class="fas fa-edit"></i></a>
                            <form action="{{ route('category.destroy', [$category->id]) }}" class="mr-1 d-inline-block" method="POST">
                                @method('DELETE')
                                @csrf
                                <button type="submit" class="btn btn-danger btn-sm "><i class="fas fa-trash"></i></button>
                            </form>
                            <a href="{{ route('category.show', [$category->id]) }}" class="btn btn-success btn-sm mr-1"><i class="fas fa-eye"></i></a>
                        </td>
                    </tr>
                @endforeach


                </tbody>
            </table>
            </div>
            <!-- /.card-body -->
        </div>
        @if($categories->hasPages())
        <div class="col-sm-12 col-md-7 mt-3">
            <div class="dataTables_paginate paging_simple_numbers" id="users_paginate">
                <ul class="pagination">
                    <li class="paginate_button page-item previous {{ ($categories->currentPage() === 1) ? 'disabled' : '' }}" id="users_previous"><a
                            href="{{ $categories->previousPageUrl() }}" aria-controls="users" data-dt-idx="0" tabindex="0"
                            class="page-link">Предыдущая страница</a>
                    </li>
                    @foreach($categories->links()->elements['0'] as $elem => $value)
                      <li class="paginate_button page-item {{ ($categories->currentPage() === $elem) ? 'active' : '' }}"><a href="{{ $value }}" aria-controls="users" data-dt-idx="{{ $elem }}"
                            tabindex="0" class="page-link">{{ $elem }}</a></li>
                    @endforeach
                    <li class="paginate_button page-item next {{ ($categories->currentPage() === $categories->lastPage()) ? 'disabled' : '' }}" id="users_next"><a href="{{ $categories->nextPageUrl() }}" aria-controls="users"
                            data-dt-idx="7" tabindex="0" class="page-link">Следующая страница</a></li>
                </ul>
            </div>
        </div>
        @endif
      </div><!-- /.container-fluid -->

    </div>




  @endsection
