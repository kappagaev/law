@extends('layout')
@section('content')
    <h1>
        Редагувати користувача
    </h1>
    <hr>
    <form action="/user/edit" method="post">
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
            <label for="firstName" class="col-sm-3 control-label">Номер телефону</label>

            <input type="text" id="phone" placeholder="Номер телефону" class="form-control" autofocus name="phone" value="{{old('phone')?:$user->phone}}" required>

        </div>
        <div class="form-group">
            <label for="firstName" class="col-sm-3 control-label">Вулиця</label>

            <input type="text" id="street" placeholder="Вулиця" class="form-control" autofocus name="street" value="{{old('street')?:$user->street}}" required>

        </div>
        <div class="form-group">
            <label for="firstName" class="col-sm-3 control-label">Дім</label>

            <input type="number" id="house" placeholder="Дім" class="form-control" autofocus name="house" value="{{old('house')?:$user->house}}" required>

        </div>
        <div class="form-group">
            <label for="firstName" class="col-sm-3 control-label">Квартира</label>

            <input type="number" id="flat" placeholder="Квартира" class="form-control" autofocus name="flat" value="{{old('flat')?:$user->flat}}" >

        </div>

        <div class="form-group">
            <label for="firstName" class="col-sm-3 control-label">Поштовий індекс*</label>

            <input type="text" id="postcode" placeholder="Поштовий індекс" class="form-control" autofocus name="postcode" value="{{old('postcode')?:$user->postcode}}" required>

        </div>
        <input type="hidden" name="territory_id" id="territory_id" value="{{old('territory_id')?:$user->territory_id}}">
        <div class="mb-3">
            <label for="violation_subj">Місто/Область</label>
            <select class="select2 form-control" id="territory1" required>

            </select>
        </div>
        <div class="mb-3">
            <div class="mb-3">
                <label for="violation_subj">Місто/Район</label>
                <select class="select2 form-control" id="territory2">

                </select>
            </div>
        </div>
        <div class="mb-3">
            <div class="mb-3">
                <label for="violation_subj">Село</label>
                <select class="select2 form-control" id="territory3">

                </select>
            </div>
        </div>


        <br>
        <hr>

        <button type="submit" class="btn btn-primary">Редагувати</button>
    </form>
    <script src="{{asset('js/request-create.js')}}"></script>
    <script src="{{asset('js/registration.js')}}"></script>
    <script src="{{asset('js/select.js')}}"></script>
@endsection
