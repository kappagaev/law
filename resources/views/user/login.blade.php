@extends('layout')

@section('content')
    <div class="container">
        <form class="form-horizontal" role="form" method="post" action="/login">
            @csrf
            <h2>Логін</h2>
            <div class="form-group">
                <label for="email" class="col-sm-3 control-label">Пошта* </label>
                <div class="col-sm-9">
                    <input type="email" id="email" placeholder="Email" class="form-control" name= "email" value="{{old('email')}}" required>
                </div>
            </div>
            <div class="form-group">
                <label for="password" class="col-sm-3 control-label">Пароль*</label>
                <div class="col-sm-9">
                    <input type="password" id="password" placeholder="Password" class="form-control" name="password" required>
                </div>
            </div>

            <div class="form-group">
                <div class="col-sm-9 col-sm-offset-3">
                    <span class="help-block">*Обов'язкові поля</span>
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-9 col-sm-offset-3">
                    <button type="submit" class="btn btn-primary btn-block">Логін</button>
                </div>
            </div>
        </form> <!-- /form -->
    </div> <!-- ./container -->
@endsection
