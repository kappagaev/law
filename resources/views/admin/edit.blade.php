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
            <div class="form-group">
                <label for="exampleInputEmail1">Пошта</label>
                <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email" name="email" value="{{ $user->email }}">
                <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
            </div>
            <div class="form-group">
                <label for="firstName" class="col-sm-3 control-label">Name*</label>

                <input type="text" id="firstName" placeholder="Name" class="form-control" autofocus name="name" value="{{$user->name}}">

            </div>
{{--            <div class="form-group">--}}
{{--                <label for="password" class="col-sm-3 control-label">Password*</label>--}}

{{--                <input type="password" id="password" placeholder="Password" class="form-control" name="password">--}}

{{--            </div>--}}
{{--            <div class="form-group">--}}
{{--                <label for="password" class="col-sm-3 control-label">Confirm Password*</label>--}}

{{--                <input type="password" id="password" placeholder="Password" class="form-control" name="password_confirmation">--}}

{{--            </div>--}}
            <div class="form-group">
                <label for="exampleInputEmail1">Виберіть роль юзера</label>
                <select class="form-control form-control-lg" name="role_id" value="{{$user->role_id}}">
                     <option value="1" @if($user->role_id == 1)
                                            selected
                                        @endif
                         >
                        Звичайний юзер
                    </option>
                    <option value="2" @if($user->role_id == 2)
                    selected
                        @endif>
                        Редактор
                    </option>
                    <option value="3"
                            @if($user->role_id == 3)
                            selected
                        @endif>
                        Адмін
                    </option>
                </select>
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Статус</label>
                <select class="form-control form-control-lg" name="status" >
                    @if ($user->status)
                        <option value="1" selected>
                            Не забанений
                        </option>
                        <option value="0">
                            Забанений
                        </option>
                    @else
                        <option value="1">
                            Не забанений
                        </option>
                        <option value="0" selected>
                            Забанений
                        </option>
                    @endif
                </select>
            </div>

            <input type="hidden" name="_method" value="put" />


            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>

@endsection
