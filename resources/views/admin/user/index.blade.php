@extends('layouts.admin')

@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Список пользователей</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('main') }}">Главная</a></li>
                    <li class="breadcrumb-item active">Пользователи</li>
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
                    <h3 class="card-title">Список пользователей</h3>
                    <a href="{{ route('user.create') }}" class="btn btn-primary btn-sm">Добавить пользователя</a>
                </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body p-0">
                <table class="table table-striped text-center">
                    <thead>
                        <tr>
                            <th style="width: 10px">#</th>
                            <th>Аватарка</th>
                            <th>Имя</th>
                            <th>Электронная почта</th>
                            <th>Роль</th>
                            <th>Действия</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                        <tr>
                            <td>{{ $user -> id}}</td>
                            <td>
                                @if (File::exists($user->image))
                                <div style="max-width:70px;max-height:70px;overflow:hidden;margin:0 auto;">
                                    <img src="{{asset($user->image)}}" alt="изображение поста" class="img-fluid">
                                </div>
                                @endif

                            </td>
                            <td>{{ $user -> name}}</td>
                            <td>{{ $user -> email}}</td>
                            <td><span class="badge bg-dark"
                                    style="font-size: 0.8rem;">{{ $user->roles[0]->name }}</span></td>
                            <td>
                                <a href="{{ route('user.edit', [$user->id]) }}" class="btn btn-primary btn-sm mr-1"><i
                                        class="fas fa-edit"></i></a>
                                <form action="{{ route('user.destroy', [$user->id]) }}" class="mr-1 d-inline-block"
                                    method="POST">
                                    @method('DELETE')
                                    @csrf
                                    <button type="submit" class="btn btn-danger btn-sm "><i
                                            class="fas fa-trash"></i></button>
                                </form>
                            </td>
                        </tr>
                        @endforeach


                    </tbody>
                </table>
            </div>
            <!-- /.card-body -->

        </div>
        @if($users->hasPages())
        <div class="col-sm-12 col-md-7 mt-3">
            <div class="dataTables_paginate paging_simple_numbers" id="users_paginate">
                <ul class="pagination">
                    <li class="paginate_button page-item previous {{ ($users->currentPage() === 1) ? 'disabled' : '' }}" id="users_previous"><a
                            href="{{ $users->previousPageUrl() }}" aria-controls="users" data-dt-idx="0" tabindex="0"
                            class="page-link">Предыдущая страница</a>
                    </li>
                    @foreach($users->links()->elements['0'] as $elem => $value)
                      <li class="paginate_button page-item {{ ($users->currentPage() === $elem) ? 'active' : '' }}"><a href="{{ $value }}" aria-controls="users" data-dt-idx="{{ $elem }}"
                            tabindex="0" class="page-link">{{ $elem }}</a></li>
                    @endforeach
                    <li class="paginate_button page-item next {{ ($users->currentPage() === $users->lastPage()) ? 'disabled' : '' }}" id="users_next"><a href="{{ $users->nextPageUrl() }}" aria-controls="users"
                            data-dt-idx="7" tabindex="0" class="page-link">Следующая страница</a></li>
                </ul>
            </div>
        </div>
        @endif
    </div><!-- /.container-fluid -->

</div>




@endsection
