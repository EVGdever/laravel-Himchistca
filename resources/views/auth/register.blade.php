@extends('layout.app')

@section('title')Регистрация@endsection

@section('content')
    <h1 class="text-center">Регистрация</h1>
    <form action="{{ route('register') }}" method="POST">
        @csrf

        <div class="form-group">
            <label for="fio">ФИО</label>
            <input
                class="form-control"
                type="text"
                name="fio"
                id="fio"
                placeholder="Введите ваше ФИО"
                required
                autofocus
            >
        </div>

        <div class="form-group">
            <label for="name">Login</label>
            <input
                class="form-control"
                type="text"
                name="name"
                id="name"
                placeholder="Введите ваш login"
                required
            >
        </div>

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

        <button type="submit" class="btn btn-primary">Зарегестрироваться</button>
    </form>
@endsection

