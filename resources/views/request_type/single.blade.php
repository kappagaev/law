@extends('admin-layout')
@section('content')
    <div class="container">
        <h2>Вид порушення: {{ $violationType->description }}</h2>

            <a href="/admin/violation/type/{{$violationType->id}}/checkbox/create" class="btn btn-secondary">Створити чекбокс</a>

        <hr>
        <table class="table">
        <thead>
        <h3>
            Чекбокси:
        </h3>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Опис</th>
            <th scope="col">Дії</th>
        </tr>
        </thead>
        <tbody>
            @foreach($violationType->checkboxes as $checkbox)
                <tr>
                    <th scope="row">{{ $checkbox->id }}</th>
                    <td>{{$checkbox->description}}</td>
                    <td>
                        <a href="{{ URL::route('checkbox.edit', $checkbox['id']) }}" class="btn btn-info mb-2">Редагувати</a>
                        <form action="{{ URL::route('checkbox.destroy', $checkbox['id']) }}" method="POST">
                            <input type="hidden" name="_method" value="DELETE">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <button class="btn btn-danger">Видалити</button>
                        </form>
                    </td>
                </tr>
            @endforeach

        </tbody>


    </div>
@endsection
