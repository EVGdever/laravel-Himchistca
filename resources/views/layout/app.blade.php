<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ URL::asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('css/style.css') }}">

    <title>@yield('title')</title>
</head>
<body>
<nav class="navbar navbar-light bg-primary p-3">
    <div class="container">
        <div class="d-flex">
            <a href="{{ route('home') }}" class="nav-item">
                <span class="nav-link">Каталог услуг</span>
            </a>
            @auth
                @if(\Illuminate\Support\Facades\Auth::user()->role == 1)
                    <a href="{{ route('service-add') }}" class="nav-item">
                        <span class="nav-link">Добавить услугу</span>
                    </a>
                @endif

                <a href="{{ route('ticket-page') }}" class="nav-item">
                    <span class="nav-link">Список заказов</span>
                </a>
            @endauth
        </div>

        <div class="d-flex">
            @guest
                <a href="{{ route('login') }}" class="nav-item">
                    <span class="nav-link">Авторизация</span>
                </a>
                <a href="{{ route('register') }}" class="nav-item">
                    <span class="nav-link">Регистрация</span>
                </a>
            @endguest
            @auth
                <div class="nav-item">
                    <span class="text-white" style="padding: .5rem 1rem;display: block">{{ Auth::user()->getFullname() }}</span>
                </div>
                <a href="{{ route('home') }}" class="nav-item">
                        <span class="nav-link"
                              onclick="event.preventDefault();document.getElementById('logout-form').submit();"
                        >Выйти</span>
                </a>
            @endauth
        </div>
    </div>
</nav>

<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none">
    @csrf
</form>

<div class="container">
    @include('inc.messeges')
    @yield('content')
</div>
</body>
