@extends('admin-layout')

@section('content')

    <table class="table">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">ПІБ</th>
            <th scope="col">Пошта</th>
            <th scope="col">Стосунок до НаУКМА</th>
            <th scope="col">Корпоративна пошта(якщо є)</th>
            <th scope="col">Роль в НаУКМА(якщо є)</th>
            <th scope="col">Більше інформації</th>
        </tr>
        </thead>
        <tbody>
        @foreach($registrations as $registration)
            <tr>
                <th scope="row">{{ $registration->id }}</th>
                <td>{{$registration->name}} {{$registration->surname}} {{$registration->patronymic}}</td>
                <td>{{$registration->email}}</td>
                @if($registration->is_naukma ==1)
                    <td>Має</td>
                    <td>{{$registration->kmamail}}</td>
                    <td>{{$registration->universityRole->name}}</td>
                @else
                    <td>Не має</td>
                    <td></td>
                    <td></td>
                @endif
                <td>
                    <a href="/admin/registration/{{$registration->id}}" class="btn btn-primary">Більше інформації</a>
                </td>
            </tr>
        @endforeach

        </tbody>
    </table>
    {{ $registrations->links('pagination::bootstrap-4') }}
@endsection
