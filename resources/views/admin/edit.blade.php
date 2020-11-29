@extends('layout')

@section('content')
    <div class="container">
        <table class="table">
            <thead>
            <tr>
                <th scope="col">Прізвище Ім'я</th>
                <th scope="col">Електронна пошта</th>
                <th scope="col">Роль</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->role->title }}</td>
            </tr>
            </tbody>
        </table>
        <form action="/user/{{ $user->id }}" method="post">
            @csrf
            <input type="hidden" name="_method" value="put" />
            <div class="form-group">
                <label for="exampleInputEmail1">Пошта</label>
                <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email" name="email" value="{{$user->email}}">
                <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Виберіть роль юзера</label>
                <select class="form-control form-control-lg" name="role_id" value="{{$user->role_id}}">
                    <option value="1">
                        Звичайний юзер
                    </option>
                    <option value="2">
                        Редактор
                    </option>
                    <option value="3">
                        Адмін
                    </option>
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>

@endsection
