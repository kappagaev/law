@extends('layout')
@section('content')
    <h1>
        Вітаю, {{$registration->name}} {{$registration->surname}}, ви тепер можете повністю зареєструватись на проєкт
    </h1>
    <form action="/registration/{{$registration->key}}" method="post">
        @csrf
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        @csrf
        <div class="form-group">
            <label for="firstName" class="col-sm-3 control-label">Номер телефону*</label>

            <input type="text" id="phone" placeholder="Номер телефону" class="form-control" autofocus name="phone" value="{{old('phone')}}" required>

        </div>
        <div class="form-group">
            <label for="firstName" class="col-sm-3 control-label">Поштовий індекс*</label>

            <input type="text" id="postcode" placeholder="Поштовий індекс" class="form-control" autofocus name="postcode" value="{{old('postcode')}}" required>

        </div>
        <div class="form-group">
            <label for="password" class="col-sm-3 control-label">Пароль*</label>

            <input type="password" id="password" placeholder="Password" class="form-control" name="password" required>

        </div>
        <div class="form-group">
            <label for="password" class="col-sm-3 control-label">Підтвердити пароль*</label>

            <input type="password" id="password" placeholder="Підтвердити пароль" class="form-control" name="password_confirmation" required>

        </div>
        <button type="submit" class="btn btn-primary">Відправити</button>
    </form>
    <script src="{{asset('js/registration.js')}}"></script>
@endsection
