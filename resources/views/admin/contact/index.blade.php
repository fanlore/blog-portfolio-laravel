@extends('layouts.admin')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Список сообщений</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('main') }}">Главная</a></li>
              <li class="breadcrumb-item active">Сообщения</li>
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
                <h3 class="card-title">Список сообщений</h3>
                </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body p-0">
            <table class="table table-striped text-center">
                <thead>
                <tr>
                    <th style="width: 10px">#</th>
                    <th>Имя</th>
                    <th>Электронная почта</th>
                    <th>Телефон</th>
                    <th>Тема</th>
                    <th>Действия</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($messages as $message)
                    <tr>
                        <td>{{ $message -> id}}</td>
                        <td>{{ $message -> name}}</td>
                        <td>{{ $message -> email}}</td>
                        <td>{{ $message -> phone}}</td>
                        <td>{{ $message -> subject}}</td>
                        <td>
                            <a href="{{  route('contact.show',['id' => $message->id])  }}" class="btn btn-success btn-sm mr-1"><i class="fas fa-eye"></i></a>
                            <form action="{{ route('contact.destroy', [$message->id]) }}" class="mr-1 d-inline-block" method="POST">
                                @method('DELETE')
                                @csrf
                                <button type="submit" class="btn btn-danger btn-sm "><i class="fas fa-trash"></i></button>
                            </form>
                        </td>
                    </tr>
                @endforeach


                </tbody>
            </table>
            </div>
            <!-- /.card-body -->
        </div>
        @if($messages->hasPages())
        <div class="col-sm-12 col-md-7 mt-3">
            <div class="dataTables_paginate paging_simple_numbers" id="users_paginate">
                <ul class="pagination">
                    <li class="paginate_button page-item previous {{ ($messages->currentPage() === 1) ? 'disabled' : '' }}" id="users_previous"><a
                            href="{{ $messages->previousPageUrl() }}" aria-controls="users" data-dt-idx="0" tabindex="0"
                            class="page-link">Предыдущая страница</a>
                    </li>
                    @foreach($messages->links()->elements['0'] as $elem => $value)
                      <li class="paginate_button page-item {{ ($messages->currentPage() === $elem) ? 'active' : '' }}"><a href="{{ $value }}" aria-controls="users" data-dt-idx="{{ $elem }}"
                            tabindex="0" class="page-link">{{ $elem }}</a></li>
                    @endforeach
                    <li class="paginate_button page-item next {{ ($messages->currentPage() === $messages->lastPage()) ? 'disabled' : '' }}" id="users_next"><a href="{{ $messages->nextPageUrl() }}" aria-controls="users"
                            data-dt-idx="7" tabindex="0" class="page-link">Следующая страница</a></li>
                </ul>
            </div>
        </div>
        @endif
      </div><!-- /.container-fluid -->

    </div>




  @endsection
