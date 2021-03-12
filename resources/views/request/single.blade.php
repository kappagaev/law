@extends('layout')
@section('content')
    <div class="container">
        <h1>{{ $request->title }}</h1>
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
           <b> Місце порушення:</b>
        </h7>
        <p>
           <b> 1. Назва органу державної влади, органу місцевого самоврядування, підприємства, установи, чи організації: </b>  {{$request->place}}
        </p>
        <p>
           <b> 2. Код ЄДРПОУ (за наявності)</b> {{$request->place_code}}
        </p>
        <p>
           <b> 3.	Адреса розташування де відбулось порушення</b> {{$request->full_address}}
        </p>
        <p>
            <b>	Дата і час порушення: </b> {{ \Carbon\Carbon::parse($request->violation_time)->format('d/m/Y')}}
        </p>
        @if($request->show_content)

            <h7>
                <b>	Обставини порушення</b>
            </h7>
            <p>{{$request->content}}</p>

        @endif
        <div>
            <span class="badge">{{ \Carbon\Carbon::parse($request->created_at)->format('d/m/Y')}}</span>

        </div>
        <hr>



    </div>
@endsection
