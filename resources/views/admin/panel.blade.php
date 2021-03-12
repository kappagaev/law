@extends('admin-layout')

@section('content')

    <div class="">
        <p>
        <h2>
            Користувачі <a href="/admin/user/create" class="btn btn-secondary">Створити користувача</a>
        </h2>
        </p>
    </div>



    <table class="table">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Ім'я</th>
            <th scope="col">Пошта</th>
            <th scope="col">Роль</th>
            <th scope="col">Статус</th>
            <th scope="col"></th>
        </tr>
        </thead>
        <tbody>
        @foreach($users as $user)
            <tr>
                <th scope="row">{{ $user->id }}</th>
                <td><a href="/admin/user/{{$user->id}}">{{$user->full_name}}</a></td>
                <td>{{$user->email}}</td>
                <td>{{$user->role->title}}</td>
                @if ($user->status)
                    <td>
                        Не забанений
                    </td>
                @else
                    <td>
                        Забанений
                    </td>
                @endif
                <td><a href="/admin/user/{{ $user->id }}/edit" class="btn btn-primary">Редагувати</a></td>
            </tr>
        @endforeach

        </tbody>
    </table>
    {{ $users->links('pagination::bootstrap-4') }}
@endsection
