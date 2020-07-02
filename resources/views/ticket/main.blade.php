@extends('layout.app')

@section('title')Список заказов@endsection



@section('content')
    <h1 class="text-center mt-2">Список заказов</h1>
    @if(isset($data))
        <table class="table">
            <thead>
            <tr>
                <th scope="col">Название</th>
                <th scope="col">Цена</th>
                <th scope="col">Статус</th>
                <th scope="col">Дата</th>
                @if(\Illuminate\Support\Facades\Auth::user()->role == 1)
                    <th scope="col">ФИО Заказчика</th>
                    <th scope="col">Завершить заказ</th>
                @endif
            </tr>
            </thead>
            <tbody>
            @foreach($data as $ticket)
                @php
                    $service = \App\Service::find($ticket->service_id);
                    $user = \App\User::find($ticket->user_id);
                @endphp
                <tr>
                    <td>{{ $service->name }}</td>
                    <td>{{ $service->cost }}</td>
                    <td>{{ $ticket->status == 0 ? 'Выполняется' : 'Готово' }}</td>
                    <td>{{ $ticket->created_at }}</td>
                    @if(\Illuminate\Support\Facades\Auth::user()->role == 1 && $ticket->status != 1)
                        <td>{{ $user->fio }}</td>
                        <td>
                            <a href="{{ route('ticket-close', $ticket->id) }}" class="btn btn-success">Завершить заказ</a>
                        </td>
                    @endif

                </tr>
            @endforeach
            </tbody>
        </table>
    @else
        <h2>Список заказов пуст</h2>
    @endif

@endsection
