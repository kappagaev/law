@extends('admin-layout')

@section('content')
    <div class="container">
        <a href="/admin/violation/sphere/create" class="btn btn-secondary">Створити сферу</a>
    </div>
    <table class="table">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Опис</th>
        </tr>
        </thead>
        <tbody>
        @foreach($spheres as $sphere)
            <tr>
                <th scope="row">{{ $sphere->id }}</th>
                <td>{{$sphere->description}}</td>
            </tr>
        @endforeach

        </tbody>
    </table>
    {{ $spheres->links('pagination::bootstrap-4') }}
@endsection
