@extends('admin-layout')

@section('content')
    <h2>
        Види порушень
    </h2>
    <div class="container">
        <a href="/admin/violation/type/create" class="btn btn-secondary">Створити Вид порушення</a>
    </div>
    <table class="table">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Опис</th>
            <th scope="col">Сфера</th>
            <th scope="col">Дії</th>
        </tr>
        </thead>
        <tbody>
        @foreach($types as $type)
            <tr>
                <th scope="row">{{ $type->id }}</th>
                <td><a href="/admin/violation/type/{{$type->id}}">{{$type->description}}</a></td>
                <td>{{$type->sphere->description}}</td>
                <td>
                    <a href="{{ URL::route('type.edit', $type['id']) }}" class="btn btn-info mb-2">Редагувати</a>
                    <form action="{{ URL::route('type.destroy', $type['id']) }}" method="POST">
                        <input type="hidden" name="_method" value="DELETE">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <button class="btn btn-danger">Видалити</button>
                    </form>
                </td>

            </tr>
        @endforeach

        </tbody>
    </table>
    {{ $types->links('pagination::bootstrap-4') }}
@endsection
