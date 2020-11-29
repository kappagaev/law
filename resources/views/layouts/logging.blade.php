@extends('layouts.app')

@section('title-block')Log in
@endsection

@section('content')
    <h1>Log in</h1>

    <form action="{{ route('logging-form') }}" method="post">
        @csrf

        <div class="form-group">
            <label for="email">Введіть електронну пошту</label>
            <input type="email" class="form-control" name="email" placeholder="Введіть електронну пошту"
                   id="email">
        </div>

        <div class="form-group">
            <label for="password">Введіть пароль</label>
            <input type="password" class="form-control" name="password" placeholder="Введіть пароль"
                   id="password">
        </div>

        <button type="submit" class="btn btn-success">Відправити</button>
    </form>
@endsection
