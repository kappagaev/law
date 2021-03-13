@extends('layout')
@section('content')
    <div class="container">

        <h1>{{ $user->full_name }}</h1>
        @if( Auth::user()->id == $user->id)
            <a href="/user/edit" class="btn btn-primary mt-2 mb-3 mr-3">Редагувати профіль</a><a href="/user/deactivate" class=" mt-2 mb-3 mr-3 btn btn-danger">Деактивувати акаунт</a>

        @endif
        {{--            <p>{{ Str::limit($request->content, 10) }}</p>--}}
        @if( Auth::user()->role_id == 3)
            <div class="">Пошта: {{$user->email}}</div>
            <div class="">Адреса: {{$user->full_address}}</div>
            <div class="">Поштовий індекс: {{$user->postcode}}</div>
            <div class="">Телефон: {{$user->phone}}</div>
            <div class="">Зареєстрований: {{$user->created_at}}</div>
            @if ($user->status)
                <div>
                    Не забанений
                </div>
            @else
                <div>
                    Забанений
                </div>
            @endif

        @endif
        <hr>
        @foreach ($requests as $request)
            <h2><a href="/request/{{$request->id}}" class="">{{ $request->place }}</a></h2>
            <p>{{$request->violationSphere->description }}</p>
            <div>
                <span class="badge">Дата порушення: {{  Carbon\Carbon::parse($request->violation_time)->format('Y-m-d') }}</span>
            </div>
            <hr>
        @endforeach
        {{ $requests->links('pagination::bootstrap-4') }}
    </div>
@endsection
