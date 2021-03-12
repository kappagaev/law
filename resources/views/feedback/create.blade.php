@extends('layout')
@section('content')
    <h1>
        Зворотній зв'язок
    </h1>
    <form action="/feedback" method="post">
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
        <div class="form-group">
            <label for="firstName" class="col-sm-3 control-label">ПІБ*</label>

            <input type="text" id="name" placeholder="ПІБ" class="form-control" autofocus name="name" value="{{old('name')}}" required>

        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Пошта*</label>
            <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Пошта" name="email" value="{{old('email')}}" required>

        </div>

        <div class="mb-3">
            <label for="address2">Повідомлення*</label>
            <textarea value="" class="form-control" rows="4" placeholder="Повідомлення" name="message"  required>{{old('message')}}</textarea>

        </div>
        <button type="submit" class="btn btn-primary">Відправити</button>
    </form>
@endsection
