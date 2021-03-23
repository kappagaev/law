@extends('admin-layout')

@section('content')
    <div class="">
        <p>
        <h2>
            Сфери
        </h2>
        </p>
    </div>
    <div class="container">
        <a href="/admin/violation/sphere/create" class="btn btn-secondary">Створити сферу</a>
    </div>
    <table class="table">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Опис</th>
            <th scope="col">Повний Опис</th>
            <th scope="col">Дії</th>
        </tr>
        </thead>
        <tbody>
        @foreach($spheres as $sphere)
            <tr>
                <th scope="row">{{ $sphere->id }}</th>
                <td>{{$sphere->description}}</td>
                <td>{{$sphere->full_description}}</td>
                <td>
                    <a href="{{ URL::route('sphere.edit', $sphere['id']) }}" class="btn btn-info mb-2">Редагувати</a>
                    <form action="{{ URL::route('sphere.destroy', $sphere['id']) }}" method="POST">
                        <input type="hidden" name="_method" value="DELETE">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <button class="btn btn-danger">Видалити</button>
                    </form>
                </td>
            </tr>
        @endforeach

        </tbody>
    </table>
    {{ $spheres->links('pagination::bootstrap-4') }}
@endsection
