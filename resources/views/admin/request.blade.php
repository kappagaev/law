@extends('layout')
@section('content')
    <div class="container">
        <h7>
            <b> Автор:</b> <a href="/admin/user/{{$request->user->id}}" class="">{{$request->user->full_name}}</a>
        </h7>
        <hr>
        <h7>
            <b>Вид порушення</b>
        </h7>
        <p>
            {{$request->violationSphere->description }} {{$request->violationType->description}}
            @foreach($request->checkboxes as $checkbox)
                {{$checkbox->description}};
            @endforeach
        </p>
        <h7>
           <b> Прізвище, ім’я, по батькові порушника (якщо воно відоме):</b> {{$request->violator}}
        </h7>
        <br>
        <h7>
            <b> Місце порушення:</b>
        </h7>
        <p>
            <b> 1. Назва органу державної влади, органу місцевого самоврядування, підприємства, установи, чи організації: </b>  {{$request->place}}
        </p>
        <p>
            <b> 2. Код ЄДРПОУ (з наявності)</b> {{$request->place_code}}
        </p>
        <p>
            <b> 3.	Адреса розташування де відбулось порушення</b> {{$request->full_address}}
        </p>
        <p>
            <b>	Дата і час порушення: </b> {{ $request->violation_time}}
        </p>

        <h7>
            <b>	Обставини порушення</b>
        </h7>
        <p>{{$request->content}}</p>

        <div>
            <span class="badge">{{ $request->created_at }}</span>

        </div>
        <hr>
        <p><a href="/admin/request/{{$request->id}}/approve" class="btn btn-success">Схвалити</a>
            <a href="/admin/request/{{$request->id}}/disprove" class="btn btn-danger">Відхилити</a></p>
        <p></p>


    </div>
@endsection
