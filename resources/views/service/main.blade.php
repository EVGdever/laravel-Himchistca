@extends('layout.app')

@section('title')Добавить услугу@endsection

@section('content')
    <h1 class="text-center">Добавить услугу</h1>
    <form action="{{ route('service-add') }}" method="POST">
        @csrf

        <div class="form-group">
            <label for="name">Название услуги</label>
            <input
                class="form-control"
                type="text"
                name="name"
                id="name"
                placeholder="Введите название услуги"
                required
            >
        </div>

        <div class="form-group">
            <label for="cost">Цена</label>
            <input
                class="form-control"
                type="text"
                name="cost"
                id="cost"
                placeholder="Укажите цену в рублях"
                required
            >
        </div>

        <button type="submit" class="btn btn-primary">Добавить</button>
    </form>
@endsection
