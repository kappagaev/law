@extends('layout')
@section('content')
    <h1>

    </h1>
    <p>
        На жаль, можливість реєстрації обмежено, адже наразі ми не маємо достатніх ресурсів для оброблення великої кількості скарг. Будь ласка, залиште свої контакти, ми повідомимо щойно відкриється можливість нових реєстрацій
    <form action="/registration-notification" method="post">
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
        @csrf
        <div class="form-group">
            <label for="firstName" class="col-sm-3 control-label">Прізвище*</label>

            <input type="text" id="surname" placeholder="Прізвище" class="form-control" autofocus name="surname" value="{{old('surname')}}" required>

        </div>
        <div class="form-group">
            <label for="firstName" class="col-sm-3 control-label">Ім'я*</label>

            <input type="text" id="name" placeholder="Ім'я" class="form-control" autofocus name="name" value="{{old('name')}}" required>

        </div>

        <div class="form-group">
            <label for="firstName" class="col-sm-3 control-label">По батькові</label>

            <input type="text" id="patronymic" placeholder="По батькові" class="form-control" autofocus name="patronymic" value="{{old('patronymic')}}">

        </div>
        <div class="form-group">
            <label for="firstName" class="col-sm-3 control-label">Пошта*</label>

            <input type="email" id="email" placeholder="Пошта" class="form-control" autofocus name="email" value="{{old('email')}}" required>

        </div>

        <input type="hidden" name="territory_id" id="territory_id" value="{{old('territory_id')}}">
        <div class="mb-3">
            <label for="violation_subj">Місто/Область*</label>
            <select class="form-control" id="territory1" required>

            </select>
        </div>
        <div class="mb-3">
            <div class="mb-3">
                <label for="violation_subj">Місто/Район</label>
                <select class="form-control" id="territory2">

                </select>
            </div>
        </div>
        <div class="mb-3">
            <div class="mb-3">
                <label for="violation_subj">Село</label>
                <select class="form-control" id="territory3">

                </select>
            </div>
        </div>


        <br>

        <hr>
        <button type="submit" class="btn btn-primary">Повідомити про відкриту реєстрацію</button>
        </form>
    Якщо Ви маєте обліковий запис Офіс 365 НаУКМА, ви можете зареєструватись за його допомогою <a href="/auth/office365/redirect" class="btn btn-success">Реєстрація через Office 365</a>
    </p><script src="{{asset('js/request-create.js')}}"></script>
    <script src="{{asset('js/registration.js')}}"></script>
    <script src="{{asset('js/select.js')}}"></script>
@endsection
