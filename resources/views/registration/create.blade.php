@extends('layout')
@section('content')
    <h1>
        Реєстрація
    </h1>
    <form action="/registration" method="post">
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
            <label for="firstName" class="col-sm-3 control-label">Ім'я*</label>

            <input type="text" id="name" placeholder="Ім'я" class="form-control" autofocus name="name" value="{{old('name')}}" required>

        </div>
        <div class="form-group">
            <label for="firstName" class="col-sm-3 control-label">Прізвище*</label>

            <input type="text" id="surname" placeholder="Прізвище" class="form-control" autofocus name="surname" value="{{old('surname')}}" required>

        </div>
        <div class="form-group">
            <label for="firstName" class="col-sm-3 control-label">По батькові</label>

            <input type="text" id="patronymic" placeholder="По батькові" class="form-control" autofocus name="patronymic" value="{{old('patronymic')}}">

        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Пошта*</label>
            <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Пошта" name="email" value="{{old('email')}}" required>

        </div>

        <div class="mb-3">
            <label for="address2">Чи маєте стосунок до НаУКМА</label>
            <input type="checkbox" id="is_naukma" name="is_naukma" value="1" {{ old('is_naukma') ? 'checked' : '' }} >

        </div>
        <div id="isNaukmaFields">
            <div class="mb-3">
                <label for="exampleInputEmail1">Виберіть вашу роль в НаУКМА*</label>
                <select class="form-control form-control-lg" name="university_role_id" id="university_role_id">
                    <option value="1" {{ old('university_role_id') == 1 ? 'selected' : '' }}>
                        Викладач_ка/Співробітник_ця
                    </option>
                    <option value="2" {{ old('university_role_id') == 2 ? 'selected' : '' }}>
                        Студент_ка
                    </option>
                    <option value="3" {{ old('university_role_id') == 3 ? 'selected' : '' }}>
                        Випускник_ця
                    </option>
                </select>
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Ваша корпоративна пошта НаУКМА*</label>
                <input type="email" class="form-control" id="kmamail" aria-describedby="emailHelp" placeholder="Пошта" name="kmamail" value="{{old('kmamail')}}">

            </div>
        </div>
        <input type="hidden" name="territory_id" id="territory_id">
        <div class="mb-3">
            <label for="violation_subj">Територія*</label>
            <select class="form-control" id="territory1" required>

            </select>
        </div>
        <div class="mb-3">
            <div class="mb-3">
                <label for="violation_subj">Територія Рівень 2</label>
                <select class="form-control" id="territory2" required>

                </select>
            </div>
        </div>
        <div class="mb-3">
            <div class="mb-3">
                <label for="violation_subj">Територія Рівень 3</label>
                <select class="form-control" id="territory3" required>

                </select>
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Відправити</button>
    </form>
    <script src="{{asset('js/request-create.js')}}"></script>
    <script src="{{asset('js/registration.js')}}"></script>
@endsection
