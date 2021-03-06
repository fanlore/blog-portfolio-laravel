
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>MyWeb</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="{{ asset('admin') }}/plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('admin') }}/css/adminlte.min.css">
  <link rel="stylesheet" href="{{ asset('admin') }}/css/toastr.min.css">
  @yield('style')
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="{{ route('main') }}" class="nav-link">Перейти на главную</a>
      </li>

    </ul>


    <ul class="navbar-nav ml-auto">


      <li class="nav-item">
        <a class="nav-link" data-widget="fullscreen" href="#" role="button">
          <i class="fas fa-expand-arrows-alt"></i>
        </a>
      </li>

    </ul>
  </nav>

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="{{ asset('admin') }}/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">AdminLTE 3</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      @if (File::exists(Auth::user()->image))
          <div class="image">
              <img src="{{ asset(Auth::user()->image) }}" class="img-circle elevation-2" alt="User Image" style="height:100%;">
          </div>
      @endif

        <div class="info">
          <a href="{{ route('user.profile') }}" class="d-block">{{ Auth::user()->name }}</a>
        </div>
      </div>



      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <li class="nav-item rounded">
                <a href="{{ route('admin.dashboard.index') }}" class="nav-link text-white">
                    <i class="nav-icon fas fa-home"></i>
                    <p>
                        Панель
                    </p>
                </a>
            </li>
            <li class="nav-item rounded">
                <a href="{{ route('portfolio.index') }}" class="nav-link text-white">
                    <i class="nav-icon fas fa-suitcase"></i>
                    <p>
                        Портфолио
                    </p>
                </a>
            </li>

          <li class="nav-item rounded">
            <a href="{{ route('category.index') }}" class="nav-link text-white">
              <i class="nav-icon fas fa-tags"></i>
              <p>
                Категории
              </p>
            </a>
          </li>
          <li class="nav-item rounded">
            <a href="{{ route('post.index') }}" class="nav-link text-white">
              <i class="nav-icon fas fa-pen-square"></i>
              <p>
                Посты
              </p>
            </a>
          </li>
           <li class="nav-item rounded">
            <a href="{{ route('user.index') }}" class="nav-link text-white">
              <i class="nav-icon fas  fa-users"></i>
              <p>
                Пользователи
              </p>
            </a>
          </li>
        <li class="nav-item rounded">
            <a href="{{ route('contact.index') }}" class="nav-link text-white">
                <i class="nav-icon fas  fa-comment"></i>
                <p>
                    Сообщения
                </p>
            </a>
        </li>
        <li class="nav-header">Лэндинг</li>
          <li class="nav-item rounded">
            <a href="{{ route('setting.index') }}" class="nav-link text-white">
            <i class="nav-icon fas  fa-cog"></i>
            <p>
                Настройки
            </p>
            </a>
          </li>
        <li class="nav-item rounded">
            <a href="{{ route('faq.index') }}" class="nav-link text-white">
                <i class="nav-icon fas fa-question"></i>
                <p>
                    FAQ
                </p>
            </a>
        </li>
          <li class="nav-header">Аккаунт</li>
          <li class="nav-item rounded">
            <a href="{{ route('user.profile') }}" class="nav-link text-white">
            <i class="nav-icon fas  fa-user"></i>
            <p>
                Профиль
            </p>
            </a>
          </li>
          <li class="nav-item rounded">
            <a href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit()" class="nav-link text-white">
              <i class="nav-icon fas fa-sign-out-alt"></i>
              <p>
                Выйти
              </p>
            </a>
          </li>

        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    @yield('content')
    </div>
  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
    <div class="p-3">
      <h5>Title</h5>
      <p>Sidebar content</p>
    </div>
  </aside>
  <!-- /.control-sidebar -->

  <!-- Main Footer -->
  <footer class="main-footer">
    <!-- To the right -->
    <div class="float-right d-none d-sm-inline">
      Anything you want
    </div>
    <!-- Default to the left -->
    <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights reserved.
  </footer>
</div>
<!-- ./wrapper -->


<form action="{{ route('logout') }}" id="logout-form" method="POST" style="display:none;">
    @csrf
</form>

<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<script src="{{ asset('admin') }}/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="{{ asset('admin') }}/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="{{ asset('admin') }}/js/adminlte.min.js"></script>
<script src="{{ asset('admin') }}/js/toastr.min.js"></script>
<script src="{{ asset('admin') }}/js/bs-custom-file-input.min.js"></script>
@yield('script')
<script>
   $(document).ready(function () {
        bsCustomFileInput.init()
    });
</script>
<script>
    @if(Session::has('success'))
        toastr.success("{{ Session::get('success') }}");
    @endif
    @if(Session::has('failure'))
        toastr.error("{{ Session::get('failure') }}");
    @endif
</script>
</body>
</html>
