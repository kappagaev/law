@extends('layout')
@section('content')
    <h1>
        Про нас
    </h1>
    <p>
        Загалом, ідея полягає у створенні сервісу для подачі скарг на заклади різних категорій, де відвідувачі зафіксували порушення Закону про мову. Завдяки цьому сервісу вони зможуть подати скаргу до уповноваженого із захисту державної мови
    </p>
    <div class="container">
        <div class="row">
            <div class="col">Команда</div>
        </div>
        <div class="row">
            <div class="col"><img src="{{asset('vlad.jpg')}}"class="img-thumbnail" alt=""></div>
            <div class="col"><img src="{{asset('trokhym.jpg')}}"class="img-thumbnail" alt=""></div>
            <div class="col"><img src="{{asset('krotevic.jpg')}}" class="img-thumbnail" alt=""></div>
        </div>
        <div class="row">
            <div class="col text-center">
                Владислав Карагаєв
            </div>
            <div class="col text-center">
                Трохим Бабич
            </div>
            <div class="col text-center">
                Євген Кротевич
            </div>
        </div>
    </div>

@endsection
