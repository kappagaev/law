@extends('layout')

@section('content')
    <div class="container">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form class="form-horizontal" role="form" method="post" action="/request">
            @csrf
            <h2>Створити пропозицію</h2>
            <div class="form-group">
                <label for="firstName" class="col-sm-3 control-label">Заголовок</label>
                <div class="col-sm-9">
                    <input type="text" id="title" placeholder="title" class="form-control" autofocus name="title" value="{{old('title')}}">
                </div>
            </div>

            <div class="form-group">

                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="content" value="{{old('content')}}"></textarea>
            </div>

            <button type="submit" class="btn btn-primary btn-block">Відправити</button>
        </form> <!-- /form -->
    </div> <!-- ./container -->
@endsection
