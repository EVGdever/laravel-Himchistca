@extends('layout.app')

@section('title')Авторизация@endsection

@section('content')
    <h1 class="text-center">Авторизация</h1>
    <form action="{{ route('login') }}" method="POST">
        @csrf

        <div class="form-group">
            <label for="email">Email</label>
            <input
                class="form-control"
                type="email"
                name="email"
                id="email"
                placeholder="Введите ваш email"
                required
            >
        </div>

        <div class="form-group">
            <label for="password">Пароль</label>
            <input
                class="form-control"
                type="password"
                name="password"
                id="password"
                placeholder="Введите пароль"
                required
            >
        </div>

        <div class="form-group">
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="remember" id="remember">
                <label class="form-check-label" for="remember">Запомнить меня</label>
            </div>
        </div>


        <button type="submit" class="btn btn-primary">Войти</button>
    </form>
@endsection
