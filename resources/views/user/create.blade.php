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
                <small id="emailHelp" class="form-text text-muted">Ми не будемо ділитися вашим електронним листом з кимось іншим.</small>
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

                <input type="text" id="postcode" placeholder="Поштовий індекс" class="form-control" autofocus name="postcode" value="{{old('postcode')}}" required>

            </div>
            <div class="form-group">
                <label for="firstName" class="col-sm-3 control-label">Номер телефону*</label>

                <input type="text" id="phone" placeholder="Номер телефону" class="form-control" autofocus name="phone" value="{{old('phone')}}" required>

            </div>
{{--            <div class="mb-3">--}}
{{--                <label for="address2">Чи має стосунок до НаУКМА</label>--}}
{{--                <input type="checkbox" id="is_naukma" name="is_naukma" value="1" {{ old('is_naukma') ? 'checked' : '' }} >--}}

{{--            </div>--}}
{{--            <div id="isNaukmaFields">--}}
{{--                <div class="mb-3">--}}
{{--                    <label for="exampleInputEmail1">Роль в НаУКМА*</label>--}}
{{--                    <select class="form-control form-control-lg" name="university_role_id" id="university_role_id">--}}
{{--                        <option value="1" {{ old('university_role_id') == 1 ? 'selected' : '' }}>--}}
{{--                            Викладач_ка/Співробітник_ця--}}
{{--                        </option>--}}
{{--                        <option value="2" {{ old('university_role_id') == 2 ? 'selected' : '' }}>--}}
{{--                            Студент_ка--}}
{{--                        </option>--}}
{{--                        <option value="3" {{ old('university_role_id') == 3 ? 'selected' : '' }}>--}}
{{--                            Випускник_ця--}}
{{--                        </option>--}}
{{--                    </select>--}}
{{--                </div>--}}
{{--                <div class="form-group">--}}
{{--                    <label for="exampleInputEmail1"> Корпоративна пошта НаУКМА*</label>--}}
{{--                    <input type="email" class="form-control" id="kmamail" aria-describedby="emailHelp" placeholder="Пошта" name="kmamail" value="{{old('kmamail')}}">--}}

{{--                </div>--}}
{{--            </div>--}}
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
            <input type="hidden" name="territory_id" id="territory_id" value="{{old('territory_id')}}">
            <div class="mb-3">
                <label for="violation_subj">Місто/Область*</label>
                <select class="form-control" id="territory1" required data-selected="{{old('territory1')}}">

                </select>
            </div>
            <div class="mb-3">
                <div class="mb-3">
                    <label for="violation_subj">Місто/Регіон</label>
                    <select class="form-control" id="territory2" data-selected="{{old('territory2')}}">

                    </select>
                </div>
            </div>
            <div class="mb-3">
                <div class="mb-3">
                    <label for="violation_subj">Село</label>
                    <select class="form-control" id="territory3" data-selected="{{old('territory3')}}">

                    </select>
                </div>
            </div>
            <div class="form-group">
                <label for="firstName" class="col-sm-3 control-label">Вулиця*</label>

                <input type="text" id="street" placeholder="Вулиця" class="form-control" autofocus name="street" value="{{old('street')}}" required>

            </div>
            <div class="form-group">
                <label for="firstName" class="col-sm-3 control-label">Дім*</label>

                <input type="number" id="house" placeholder="Дім" class="form-control" autofocus name="house" value="{{old('house')}}" required>

            </div>
            <div class="form-group">
                <label for="firstName" class="col-sm-3 control-label">Квартира</label>

                <input type="number" id="flat" placeholder="Квартира" class="form-control" autofocus name="flat" value="{{old('flat')}}" >

            </div>
{{--            <div class="form-group">--}}
{{--                <label for="password" class="col-sm-3 control-label">Пароль*</label>--}}

{{--                    <input type="password" id="password" placeholder="Password" class="form-control" name="password" required>--}}

{{--            </div>--}}
{{--            <div class="form-group">--}}
{{--                <label for="password" class="col-sm-3 control-label">Підтвердити пароль*</label>--}}

{{--                <input type="password" id="password" placeholder="Підтвердити пароль" class="form-control" name="password_confirmation" required>--}}

{{--            </div>--}}
{{--            <div class="form-group">--}}
{{--                <label for="password" class="col-sm-3 control-label">Confirm Password*</label>--}}

{{--                    <input type="password" id="password" placeholder="Password" class="form-control" name="password_confirmation">--}}

{{--            </div>--}}
            <div class="form-group">
                <label for="exampleInputEmail1">Виберіть роль юзера*</label>
                <select class="form-control" name="role_id" required>
                    <option value="2">
                        Звичайний юзер
                    </option>
                    <option value="3">
                        Адмін
                    </option>
                </select>
            </div>


            <button type="submit" class="btn btn-primary">Створити</button>
        </form>
    </div> <!-- ./container -->
    <script src="{{asset('js/registration.js')}}"></script>
    <script src="{{asset('js/request-create.js')}}"></script>
@endsection
