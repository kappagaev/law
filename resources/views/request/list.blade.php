@extends('layout')
@section('content')
    <div class="container">

        <h2>
            Пошук
        </h2>
        <form action="/" method="get">
            <div class="row">
                <div class="col">
                    <label for="violation_subj">Сфера порушення</label>

                </div>
                <div class="col">
                    <label for="violation_subj">Вид порушення</label>

                </div>
                <div class="col">
                    <label for="violation_subj">Місто/Область</label>

                </div>
                <div class="col">
                    <label for="violation_subj">Місто/Район</label>

                </div>
                <div class="col">
                    <label for="violation_subj">Село</label>

                </div>


            </div>
            <div class="row">
                <div class="col">
                    <select class="js-example-basic-single select2 form-control"  id="sphere" name="violation_sphere_id" data-sphere-id="{{request()->input('violation_sphere_id')}}"  value="{{request()->input('violation_sphere_id')}}">
                    </select>
                </div>
                <div class="col">
                    <select class="form-control select2 js-example-basic-single" id="type" name="violation_type_id" data-type-id="{{request()->input('violation_type_id')}}"  value="{{request()->input('violation_type_id')}}">

                    </select>
                </div>
                <input type="hidden" name="territory_id" id="territory_id">
                <div class="col">
                    <select class="form-control select2 js-example-basic-single" id="territory1" name="territory1" data-selected="{{request()->input('territory1')}}">

                    </select>
                </div>
                <div class="col">
                    <div class="mb-3">

                        <select class="form-control select2 js-example-basic-single" id="territory2" name="territory2" data-selected="{{request()->input('territory2')}}">

                        </select>
                    </div>
                </div>
                <div class="col">
                    <div class="mb-3">
                        <select class="form-control select2 js-example-basic-single" id="territory3" name="territory3" data-selected="{{request()->input('territory3')}}">

                        </select>
                    </div>
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
                    <br>
                    <button class="btn btn-primary btn-lg btn-block" type="submit">Шукати</button>
                </div>
            </div>
        </form>

        <h1>
            Головна
        </h1>
        @foreach ($requests as $request)
            <h2><a href="/request/{{$request->id}}" class="">{{ $request->place }}</a></h2>
            <p>{{$request->violationSphere->description }}</p>
            <div>
                <span class="badge">Дата порушення: {{  Carbon\Carbon::parse($request->violation_time)->format('Y-m-d') }}</span>
            </div>
            <hr>
        @endforeach


    </div>

    {{ $requests->links('pagination::bootstrap-4') }}

    <script>
        var today = new Date();
        var dd = String(today.getDate() + 1).padStart(2, '0');
        var mm = String(today.getMonth() + 1).padStart(2, '0'); //January is 0!
        var yyyy = today.getFullYear();

        tommorow = yyyy + '-' + mm + '-' + dd;


        $('#violation_time').datetimepicker({
            datepicker:true,
            timepicker:false,
            language: 'ua',
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
            setEndDate: tommorow,
            setStartDate: "2020-01-01",
            format: 'Y-m-d'
        });
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
            setEndDate: tommorow,
            setStartDate: "2020-01-01",
            format: 'Y-m-d'
        });


    </script>

@endsection
