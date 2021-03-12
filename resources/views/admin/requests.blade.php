@extends('admin-layout')

@section('content')

        <p>
        <h2>
            Звертання
        </h2>
        </p>

    <table class="table">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Заголовок</th>
            <th scope="col">Юзер</th>
            <th scope="col">Час створення</th>
            <th scope="col">Сфера порушення</th>
            <th scope="col">Вид порушення</th>
            <th scope="col">Порушник</th>
            <th scope="col">Назва органу державної влади</th>
            <th scope="col">Адреса</th>
            <th scope="col">час порушення</th>
        </tr>
        </thead>
        <tbody>
        @foreach($requests as $request)
            <tr>
                <th scope="row">{{ $request->id }}</th>
                <td>{{$request->title}}</td>
                <td><a href="/admin/user/{{$request->user_id}}">{{$request->user->full_name}}</a></td>
                <td>{{$request->created_at}}</td>
                <td>{{$request->violationSphere->description}}</td>
                <td>{{$request->violationType->description}}</td>
                <td>{{$request->violator}}</td>
                <td>{{$request->place}}</td>
                <td>{{$request->full_address}}</td>
                <td>{{$request->violation_time}}</td>
            </tr>
        @endforeach

        </tbody>
    </table>
    {{ $requests->links('pagination::bootstrap-4') }}
@endsection
