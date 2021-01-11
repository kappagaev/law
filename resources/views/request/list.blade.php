@extends('layout')
@section('content')
    <div class="container">

        <h2>
            Пошук
        </h2>
        <form action="/" method="get">
            <div class="row">
                <div class="col">
                    <label for="violation_subj">4.1 Регіон порушення</label>

                </div>
                <div class="col">
                    <label for="violation_subj">4.2 Область порушення</label>

                </div>
                <div class="col">
                    <label for="violation_subj">4.3 Населений пункт порушення</label>

                </div>

                <div class="col">
                    <label for="violation_subj">1.1 Сфера порушення</label>

                </div>
                <div class="col">
                    <label for="violation_subj">1.2 Вид порушення</label>

                </div>
            </div>
            <div class="row">
                <div class="col">
                    <select class="form-control" id="region" name="region_id">
                        <option value="">Виберіть регіон порушення</option>
                        @if(request()->input('region_id'))
                            @foreach($regions as $region)
                                <option
                                    @if(request()->input('region_id') == $region->id)
                                    selected
                                    @endif
                                    value="{{$region->id}}"
                                >
                                    {{$region->name}}
                                </option>

                            @endforeach

                        @else
                            @foreach ($regions as $region)
                                <option value="{{$region->id}}">{{$region->name}}</option>

                            @endforeach
                        @endif

                    </select>
                </div>
                <div class="col">
                    <select class="form-control" id="district" name="district_id">
                        <option value="">
                            Виберіть область порушення
                        </option>
                        @if(request()->input('district_id'))

                            @foreach($districts as $district)
                                <option
                                    @if(request()->input('district_id') == $district->id)
                                        selected
                                    @endif
                                    value="{{$district->id}}"
                                >
                                    {{$district->name}}
                                </option>

                            @endforeach
                        @endif
                    </select>
                </div>
                <div class="col">
                    <select class="form-control" id="settlement" name="settlement_id">
                        <option value="">
                            Виберіть населений пункт порушення
                        </option>
                        @if(request()->input('settlement_id'))

                            @foreach($settlements as $settlement)
                                <option
                                    @if(request()->input('settlement_id') == $settlement->id)
                                    selected
                                    @endif
                                    value="{{$settlement->id}}"
                                >
                                    {{$settlement->name}}
                                </option>

                            @endforeach
                        @endif
                    </select>
                </div>
                <div class="col">
                    <select class="form-control" id="sphere" name="violation_sphere_id">
                        <option value="">Виберіть сферу порушення</option>
                        @if(request()->input('violation_sphere_id'))
                            @foreach($spheres as $sphere)
                                <option
                                    @if(request()->input('violation_sphere_id') == $sphere->id)
                                    selected
                                    @endif
                                    value="{{$sphere->id}}"
                                >
                                    {{$sphere->description}}
                                </option>

                            @endforeach
                        @else
                            @foreach ($spheres as $sphere)
                                <option value="{{$sphere->id}}">{{$sphere->description}}</option>

                            @endforeach
                        @endif

                    </select>
                </div>
                <div class="col">
                    <select class="form-control" id="type" name="violation_type_id">
                        <option value="">Виберіть сферу порушення</option>
                        @if(request()->input('violation_type_id'))
                            @foreach($types as $type)
                                <option
                                    @if(request()->input('violation_type_id') == $type->id)
                                    selected
                                    @endif
                                    value="{{$type->id}}"
                                >
                                    {{$type->description}}
                                </option>

                            @endforeach
                        @endif
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="sm-3">
                        <label for="violation_time">Дата порушення</label>
                    </div>
                    <div class="sm-3">
                        <input id="violation_time" type="text" class=""  name="violation_time" value="{{request()->input('violation_time')}}" >

                        <div class="invalid-feedback">
                            Please enter your shipping address.
                        </div>
                    </div>


                </div>
                <div class="col">
                    <div class="sm-3">
                        <label for="created_at">Дата реєстрації звернення</label>

                    </div>
                    <div class="sm-3">
                        <input id="created_at" type="text" class=""  name="created_at" value="{{request()->input('created_at')}}" >

                        <div class="invalid-feedback">
                            Please enter your shipping address.
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="sm-3">
                        <label>Завершити пошук</label>

                    </div>
                    <button class="btn btn-primary btn-lg btn-block" type="submit">Відправити</button>
                </div>
            </div>
        </form>

        <h1>
            Головна
        </h1>
        @foreach ($requests as $request)
            <h2><a href="/request/{{$request->id}}" class="">{{ $request->title }}</a></h2>
            <p>{{ Str::limit($request->content, 270) }}</p>
            <div>
                <span class="badge">{{ $request->created_at->format('Y-m-d') }}</span>
            </div>
            <hr>
        @endforeach


    </div>

    {{ $requests->links('pagination::bootstrap-4') }}

    <script>
        $.datetimepicker.setLocale('ua');
        $('#violation_time').datetimepicker({
            datepicker:true,
            timepicker:false,
            i18n: {
                ua: {
                    months: [
                        'Січень', 'Лютий', 'Березень', 'Квітень',
                        'Травень', 'Червень', 'Липень', 'Серпень',
                        'Вересень', 'Жовтень', 'Листопад', 'Грудень',
                    ],
                    dayOfWeek: [
                        "Пн", "Вт", "Ср", "Чт",
                        "Пт", "Сб", "Нд",
                    ]
                },
            },

            format: 'Y-m-d'
        });
        $.datetimepicker.setLocale('ua');
        $('#created_at').datetimepicker({
            datepicker:true,
            timepicker:false,
            i18n: {
                ua: {
                    months: [
                        'Січень', 'Лютий', 'Березень', 'Квітень',
                        'Травень', 'Червень', 'Липень', 'Серпень',
                        'Вересень', 'Жовтень', 'Листопад', 'Грудень',
                    ],
                    dayOfWeek: [
                        "Пн", "Вт", "Ср", "Чт",
                        "Пт", "Сб", "Нд",
                    ]
                },
            },

            format: 'Y-m-d'
        });
    </script>
    <script src="{{asset('js/request-create.js')}}"></script>
@endsection
