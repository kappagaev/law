@extends('layout')

@section('content')
    <div class="container">
        <h1>Створити користувача</h1>
        <form action="/user" method="post">
            @csrf
            <div class="form-group">
                <label for="exampleInputEmail1">Пошта</label>
                <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email" name="email" value="">
                <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
            </div>
            <div class="form-group">
                <label for="firstName" class="col-sm-3 control-label">Name*</label>

                    <input type="text" id="firstName" placeholder="Name" class="form-control" autofocus name="name" value="{{old('name')}}">

            </div>
            <div class="form-group">
                <label for="password" class="col-sm-3 control-label">Password*</label>

                    <input type="password" id="password" placeholder="Password" class="form-control" name="password">

            </div>
            <div class="form-group">
                <label for="password" class="col-sm-3 control-label">Confirm Password*</label>

                    <input type="password" id="password" placeholder="Password" class="form-control" name="password_confirmation">

            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Виберіть роль юзера</label>
                <select class="form-control form-control-lg" name="role_id">
                    <option value="1" selected>
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
    </div> <!-- ./container -->
@endsection
