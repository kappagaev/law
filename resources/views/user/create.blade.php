@extends('admin-layout')

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
        <h1>Створити користувача</h1>
        <form action="/admin/user" method="post">
            @csrf
            <div class="form-group">
                <label for="exampleInputEmail1">Пошта*</label>
                <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email" name="email" value="" required>
                <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
            </div>
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
                <label for="firstName" class="col-sm-3 control-label">Поштовий індекс*</label>

                <input type="text" id="postcode" placeholder="postcode" class="form-control" autofocus name="postcode" value="{{old('postcode')}}" required>

            </div>
            <div class="form-group">
                <label for="firstName" class="col-sm-3 control-label">Номер телефону*</label>

                <input type="text" id="phone" placeholder="phone" class="form-control" autofocus name="phone" value="{{old('phone')}}" required>

            </div>
{{--            <div class="mb-3">--}}
{{--                <label for="violation_subj">Область*</label>--}}
{{--                <select class="form-control" id="region" name="region_id" data-region-id="{{old('region_id')}}" required>--}}

{{--                </select>--}}
{{--            </div>--}}
{{--            <div class="mb-3">--}}
{{--                <label for="violation_subj">Регіон*</label>--}}
{{--                <select class="form-control" id="district" name="district_id"  data-district-id="{{old('district_id')}}" required>--}}

{{--                </select>--}}
{{--            </div>--}}
{{--            <div class="mb-3">--}}
{{--                <label for="violation_subj">Населений пункт*</label>--}}
{{--                <select class="form-control" id="settlement" name="settlement_id" required  data-settlement-id="{{old('settlement_id')}}">--}}

{{--                </select>--}}
{{--            </div>--}}
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
            <div class="form-group">
                <label for="firstName" class="col-sm-3 control-label">Адреса*</label>

                <input type="text" id="address" placeholder="address" class="form-control" autofocus name="address" value="{{old('address')}}" required>

            </div>
            <div class="form-group">
                <label for="password" class="col-sm-3 control-label">Пароль*</label>

                    <input type="password" id="password" placeholder="Password" class="form-control" name="password" required>

            </div>
            <div class="form-group">
                <label for="password" class="col-sm-3 control-label">Підтвердити пароль*</label>

                <input type="password" id="password" placeholder="Підтвердити пароль" class="form-control" name="password_confirmation" required>

            </div>
{{--            <div class="form-group">--}}
{{--                <label for="password" class="col-sm-3 control-label">Confirm Password*</label>--}}

{{--                    <input type="password" id="password" placeholder="Password" class="form-control" name="password_confirmation">--}}

{{--            </div>--}}
            <div class="form-group">
                <label for="exampleInputEmail1">Виберіть роль юзера*</label>
                <select class="form-control form-control-lg" name="role_id" required>
                    <option value="2">
                        Звичайний юзер
                    </option>
                    <option value="3">
                        Адмін
                    </option>
                </select>
            </div>


            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div> <!-- ./container -->
    <script src="{{asset('js/request-create.js')}}"></script>
@endsection
