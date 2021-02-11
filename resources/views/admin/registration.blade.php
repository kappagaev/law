@extends('admin-layout')
@section('content')
    <div class="container">
        <p>
            <h2>
                Реєстрація користувача
            </h2>
        </p>
        <p>
            <b> ПІБ:</b> {{$registration->full_name}}
        </p>
        <p>
            <b>Email</b> {{$registration->email}}
        </p>
        @if($registration->is_naukma == 1)
            <p>
                <b>Має стосунок до НаУКМА</b>
            </p>
            <p>
                <b>Корпоративна пошта: </b> {{$registration->kmamail}}
            </p>
            <p>
                <b>Роль в НаУМА: </b> {{$registration->universityRole->name}}
            </p>

        @else
            <p>
                Не має стосунок до НаУКМА
            </p>

        @endif
        <p>
            <b>Адрес</b> {{$registration->full_address}}
        </p>
        <hr>
            <p><a href="/admin/registration/{{$registration->id}}/prove" class="btn btn-success">Схвалити</a>
                <a href="/admin/registration/{{$registration->id}}/disprove" class="btn btn-danger">Відхилити</a></p>
            <p></p>
        </div>




    </div>
@endsection
