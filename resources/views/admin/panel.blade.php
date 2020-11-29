@extends('layout')

@section('content')
    <table class="table">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">First</th>
            <th scope="col">Last</th>
            <th scope="col">Handle</th>
            <th scope="col"></th>
        </tr>
        </thead>
        <tbody>
        @foreach($users as $user)
            <tr>
                <th scope="row">{{ $user->id }}</th>
                <td>{{$user->name}}</td>
                <td>{{$user->email}}</td>
                <td>{{$user->role->title}}</td>
                <td><a href="/user/{{ $user->id }}/edit" class="btn btn-primary">Редагувати</a></td>
            </tr>
        @endforeach

        </tbody>
    </table>
    {{ $users->links('pagination::bootstrap-4') }}
@endsection
