@extends('layouts.admin')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Сообщение</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('main') }}">Главная</a></li>
              <li class="breadcrumb-item active">Сообщение</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <div class="content">
      <div class="container-fluid">
        <div class="card">
            <table class="table">
                <thead class="thead-dark">
                <tr>
                    <th scope="col">Сообщение от </th>
                    <th scope="col">{{ $message->name }}</th>
                    <th scope="col"></th>
                    <th scope="col"></th>
                    <th scope="col"></th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <th scope="row">Идентификатор</th>
                    <td>{{ $message -> id  }}</td>
                </tr>
                <tr>
                    <th scope="row">Имя</th>
                    <td>{{ $message -> name  }}</td>
                </tr>
                <tr>
                    <th scope="row">Почта</th>
                    <td>{{ $message -> email  }}</td>
                </tr>
                <tr>
                    <th scope="row">Телефон</th>
                    <td>{{ $message -> phone  }}</td>
                </tr>
                <tr>
                    <th scope="row">Тема</th>
                    <td>{{ $message -> subject  }}</td>
                </tr>
                <tr>
                    <th scope="row">Сообщение</th>
                    <td>{{ $message -> message  }}</td>
                </tr>
                </tbody>
            </table>
        </div>

      </div><!-- /.container-fluid -->

    </div>




  @endsection
