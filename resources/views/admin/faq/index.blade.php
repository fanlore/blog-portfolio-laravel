@extends('layouts.admin')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Список вопросов</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('main') }}">Главная</a></li>
              <li class="breadcrumb-item active">Вопросы</li>
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
                    <h3 class="card-title">Список вопросов</h3>
                    <a href="{{ route('faq.create') }}" class="btn btn-primary btn-sm">Добавить вопрос</a>
                </div>

            </div>
            <div class="col-12" id="accordion">
                @foreach($faqs as $faq)
                    <div class="card card-primary card-outline mt-3">
                        <a class="d-block w-100 collapsed" data-toggle="collapse" href="#collapse{{ $faq->id  }}" aria-expanded="false">
                            <div class="card-header">
                              <div class="d-flex align-items-center justify-content-between">
                                  <h4 class="card-title w-100">
                                      {{ $faq->question  }}
                                  </h4>
                                  <div class="d-flex">
                                      <a href="{{ route('faq.edit', ['faq' => $faq->id]) }}" class="btn btn-primary btn-sm mr-1"><i class="fas fa-edit"></i></a>
                                      <form action="{{ route('faq.destroy', ['faq' => $faq->id]) }}" class="mr-1 d-inline-block" method="POST">
                                          @method('DELETE')
                                          @csrf
                                          <button type="submit" class="btn btn-danger btn-sm "><i class="fas fa-trash"></i></button>
                                      </form>
                                  </div>
                              </div>
                            </div>
                        </a>
                        <div id="collapse{{ $faq->id  }}" class="collapse" data-parent="#accordion">
                            <div class="card-body">
                                {{ $faq->answer  }}
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

        </div>
      </div><!-- /.container-fluid -->

    </div>

@endsection
