@extends('layout.app')

@section('title')Главная страница@endsection

@section('content')
    <h1 class="text-center mt-2">Каталог услуг</h1>
    @forelse($data as $service)
        <div class="card m-3" style="width: 18rem; display: inline-block;">
            <div class="card-body">
                <h5 class="card-title">{{ $service->name }}</h5>
                <p class="card-text">Цена: <b>{{ $service->cost }} руб.</b></p>
                @auth
                    <a href="{{ route('ticket-create', $service->id) }}" class="btn btn-success mb-3">Получить услугу</a><br>
                    @if(\Illuminate\Support\Facades\Auth::user()->role == 1)
                        <a href="{{ route('service-update', $service->id) }}" class="btn btn-info mb-3">Изменить</a><br>
                        <a href="{{ route('service-delete', $service->id) }}" class="btn btn-danger">Удалить</a>
                    @endif
                @endauth
            </div>
        </div>
    @empty
        <h2>Услуги отсутствуют</h2>
    @endforelse
@endsection
