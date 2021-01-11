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
        </tr>
        </thead>
        <tbody>
            @foreach($violationType->checkboxes as $checkbox)
                <tr>
                    <th scope="row">{{ $checkbox->id }}</th>
                    <td>{{$checkbox->description}}</td>
                </tr>
            @endforeach

        </tbody>


    </div>
@endsection
