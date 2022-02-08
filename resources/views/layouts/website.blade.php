<!DOCTYPE html>
<html lang="ru" class="page">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <meta name="theme-color" content="#111111">
  <title>myweb</title>
  <link rel="stylesheet" href="{{ asset('website') }}/css/vendor.css">
  <link rel="stylesheet" href="{{ asset('website') }}/css/main.css">
  <script defer src="{{ asset('website') }}/js/main.js"></script>
</head>

<body class="page__body" data-theme="blue">
  <div class="site-container">

    <div class="loader">
      <div class="loader__balls">
        <div class="loader__ball loader__ball--red"></div>
        <div class="loader__ball loader__ball--blue"></div>
        <div class="loader__ball loader__ball--green"></div>
        <div class="loader__ball loader__ball--yellow"></div>
      </div>
      <p class="loader__text">Loading</p>
    </div>

    <header class="header">
      <a href="{{ route('main') }}"><img src="{{ asset('website') }}/img/logo.svg" alt="Логотип"></a>
      <div class="burger">
        <div class="burger__line"></div>
      </div>
    </header>
    <div class="burger-menu">
      <ul class="navigation">
        <div class="navigation__round"></div>
        <li class="navigation__item">
          <a href="{{ route('main') }}" class="navigation__link">Главная</a>
        </li>
        <li class="navigation__item">
          <a href="{{ route('portfolio') }}" class="navigation__link">Портфолио</a>
        </li>
        <li class="navigation__item">
          <a href="{{ route('blog') }}" class="navigation__link">Блог</a>
        </li>
         @if (Auth::check())
            @if(Auth::user()->hasrole('admin'))
                <li class="navigation__item">
                  <a href="{{ route('admin.dashboard.index') }}" class="navigation__link">Админ-панель</a>
                </li>
            @endif
         @endif
          @if(!Auth::user())
          <li class="navigation__item">
              <a href="{{ route('login') }}" class="navigation__link">Авторизация</a>
          </li>
          @else

          <li class="navigation__item">
              <a href="{{ route('logout') }}" class="navigation__link" onclick="event.preventDefault();document.getElementById('logout-form').submit()">Выйти</a>
          </li>
          @endif
      </ul>
      <div class="choice-theme choice-theme-menu">
        <p class="choice-theme__title">
          Выберите тему
        </p>
        <div class="choice-theme__container">
          <div class="choice-theme__item">
            <input type="radio" id="blue" name="choice-theme" class="choice-theme__radio visually-hidden" checked>
            <label for="blue" class="choice-theme__label choice-theme__label--blue"></label>
          </div>
          <div class="choice-theme__item">
            <input type="radio" id="red" name="choice-theme" class="choice-theme__radio visually-hidden">
            <label for="red" class="choice-theme__label choice-theme__label--red"></label>
          </div>
          <div class="choice-theme__item">
            <input type="radio" id="green" name="choice-theme" class="choice-theme__radio visually-hidden">
            <label for="green" class="choice-theme__label choice-theme__label--green"></label>
          </div>
          <div class="choice-theme__item">
            <input type="radio" id="yellow" name="choice-theme" class="choice-theme__radio visually-hidden">
            <label for="yellow" class="choice-theme__label choice-theme__label--yellow"></label>
          </div>
        </div>
      </div>
    </div>
    <div class="header-space"></div>

    @yield('content')

      <form action="{{ route('logout') }}" id="logout-form" method="POST" style="display:none;">
          @csrf
      </form>
  </div>
@yield('script')
</body>

</html>
