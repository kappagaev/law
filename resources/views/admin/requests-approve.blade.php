@extends('admin-layout')

@section('content')

    <table class="table">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Заголовок</th>
            <th scope="col">Юзер</th>
            <th scope="col">Час створення</th>
            <th scope="col">Назва органу державної влади</th>
            <th scope="col">Адреса</th>
            <th scope="col">час порушення</th>
            <th scope="col">Більше інформації</th>
        </tr>
        </thead>
        <tbody>
        @foreach($requests as $request)
            <tr>
                <th scope="row">{{ $request->id }}</th>
                <td>{{$request->title}}</td>
                <td><a href="/admin/user/{{$request->user_id}}">{{$request->user->full_name}}</a></td>
                <td>{{$request->created_at}}</td>
                <td>{{$request->place}}</td>
                <td>{{$request->full_address}}</td>
                <td>{{$request->violation_time}}</td>
                <td><a class="btn btn-primary" href="/admin/request/{{$request->id}}">Більше інформації</a></td>
            </tr>
        @endforeach

        </tbody>
    </table>
    {{ $requests->links('pagination::bootstrap-4') }}
@endsection
