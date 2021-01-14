@extends('admin-layout')

@section('content')
    <div class="container">
        <table class="table">
            <thead>
            <tr>
                <th scope="col">Прізвище Ім'я</th>
                <th scope="col">Електронна пошта</th>
                <th scope="col">Роль</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->role->title }}</td>
            </tr>
            </tbody>
        </table>
        <form action="/admin/user/{{ $user->id }}" method="post">
            @csrf
            <div class="form-group">
                <label for="exampleInputEmail1">Пошта</label>
                <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email" name="email" value="{{ $user->email }}">
                <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
            </div>
            <div class="form-group">
                <label for="firstName" class="col-sm-3 control-label">Name*</label>

                <input type="text" id="firstName" placeholder="Name" class="form-control" autofocus name="name" value="{{$user->name}}">

            </div>
            <div class="form-group">
                <label for="firstName" class="col-sm-3 control-label">Surname*</label>

                <input type="text" id="surname" placeholder="Name" class="form-control" autofocus name="surname" value="{{$user->surname}}" required>

            </div>
            <div class="form-group">
                <label for="firstName" class="col-sm-3 control-label">Patronymic*</label>

                <input type="text" id="patronymic" placeholder="Name" class="form-control" autofocus name="patronymic" value="{{$user->patronymic}}" required>

            </div>
            <div class="form-group">
                <label for="firstName" class="col-sm-3 control-label">postcode*</label>

                <input type="text" id="postcode" placeholder="postcode" class="form-control" autofocus name="postcode" value="{{$user->postcode}}" required>

            </div>
            <div class="form-group">
                <label for="firstName" class="col-sm-3 control-label">phone*</label>

                <input type="text" id="phone" placeholder="phone" class="form-control" autofocus name="phone" value="{{$user->phone}}" required>

            </div>
            <div class="form-group">
                <label for="firstName" class="col-sm-3 control-label">address</label>

                <input type="text" id="address" placeholder="address" class="form-control" autofocus name="address" value="{{$user->address}}" required>

            </div>
{{--            <div class="form-group">--}}
{{--                <label for="password" class="col-sm-3 control-label">Password*</label>--}}

{{--                <input type="password" id="password" placeholder="Password" class="form-control" name="password">--}}

{{--            </div>--}}
{{--            <div class="form-group">--}}
{{--                <label for="password" class="col-sm-3 control-label">Confirm Password*</label>--}}

{{--                <input type="password" id="password" placeholder="Password" class="form-control" name="password_confirmation">--}}

{{--            </div>--}}
            <div class="form-group">
                <label for="exampleInputEmail1">Виберіть роль юзера</label>
                <select class="form-control form-control-lg" name="role_id" value="{{$user->role_id}}">
                    <option value="2" @if($user->role_id == 2)
                    selected
                        @endif>
                        Звичайний юзер
                    </option>
                    <option value="3"
                            @if($user->role_id == 3)
                            selected
                        @endif>
                        Адмін
                    </option>
                </select>
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Статус</label>
                <select class="form-control form-control-lg" name="status" >
                    @if ($user->status)
                        <option value="1" selected>
                            Не забанений
                        </option>
                        <option value="0">
                            Забанений
                        </option>
                    @else
                        <option value="1">
                            Не забанений
                        </option>
                        <option value="0" selected>
                            Забанений
                        </option>
                    @endif
                </select>
            </div>
            <div class="mb-3">
                <label for="violation_subj">Регіон порушення</label>
                <select class="form-control" id="region" name="region_id">
                    <option>Виберіть регіон порушення</option>
                    @foreach ($regions as $region)
                        <option value="{{$region->id}}" @if($region->id == $user->region_id)
                        selected
                            @endif>{{$region->name}}</option>

                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="violation_subj">Область порушення</label>
                <select class="form-control" id="district" name="district_id">
                    @foreach ($districts as $district)
                        <option value="{{$district->id}}"
                        @if($district->id == $user->district_id)
                            selected
                            @endif
                        >{{$district->name}}</option>

                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="violation_subj">Населений пункт порушення</label>
                <select class="form-control" id="settlement" name="settlement_id">
                    @foreach ($settlements as $settlement)
                        <option value="{{$settlement->id}}"
                                @if($settlement->id == $user->settlement_id)
                                    selected
                                @endif>
                            {{$settlement->name}}</option>

                    @endforeach
                </select>
            </div>
            <input type="hidden" name="_method" value="put" />


            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
    <script src="{{asset('js/request-create.js')}}"></script>
@endsection
