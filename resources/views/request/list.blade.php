@extends('layout')
@section('content')
    <div class="container">

        <h2>
            Пошук
        </h2>
        <form action="/" method="get">
            <div class="row">
                <div class="col col-12 col-sm-6 mb-3">
                    <label for="sphere">Сфера порушення</label>
                    <select class="js-example-basic-single select2 form-control"  id="sphere" name="violation_sphere_id" data-sphere-id="{{request()->input('violation_sphere_id')}}"  value="{{request()->input('violation_sphere_id')}}">
                    </select>
                </div>
                <div class="col col-12 col-sm-6 mb-3">
                    <label for="type">Вид порушення</label>
                    <select class="form-control select2 js-example-basic-single" id="type" name="violation_type_id" data-type-id="{{request()->input('violation_type_id')}}"  value="{{request()->input('violation_type_id')}}">

                    </select>
                </div>

            </div>
            <div class="row">
                <input type="hidden" name="territory_id" id="territory_id" value="{{request()->input('territory_id')}}">
                <div class="col col-12 col-sm-4 mb-3">
                    <label for="territory1">Місто/Область</label>
                    <select class="form-control select2 js-example-basic-single" id="territory1" name="territory1" data-selected="{{request()->input('territory1')}}">

                    </select>
                </div>
                <div class="col col-12 col-sm-4 mb-3">
                    <label for="territory2">Місто/Район</label>
                    <select class="form-control select2 js-example-basic-single" id="territory2" name="territory2" data-selected="{{request()->input('territory2')}}">

                    </select>
                </div>
                <div class="col col-12 col-sm-4 mb-3">
                    <label for="territory3">Село</label>
                    <select class="form-control select2 js-example-basic-single" id="territory3" name="territory3" data-selected="{{request()->input('territory3')}}">

                    </select>
                </div>
            </div>
            <div class="row align-items-end">
                <div class="col col-12 col-sm-4 mb-3">
                        <label for="violation_time">Дата порушення</label>
                        <input id="violation_time" autocomplete="off" type="text" class=""  name="violation_time" value="{{request()->input('violation_time')}}" >

                        <div class="invalid-feedback">
                            Please enter your shipping address.
                        </div>
                </div>
                <div class="col col-12 col-sm-4 mb-3">
                        <label for="created_at">Дата реєстрації звернення</label>
                        <input id="created_at" autocomplete="off" type="text" class=""  name="created_at" value="{{request()->input('created_at')}}" >
                        <div class="invalid-feedback">
                            Please enter your shipping address.
                        </div>
                </div>
                <div class="col col-12 col-sm-4 mb-3">
                    <label for="sort">Сортувати за</label>
                    <select class="form-control select2 js-example-basic-single" id="sort" name="sort">
                        <option value="created_at" {{request()->input('sort') == "created_at"?"selected":""}}>За датою створення</option>
                        <option value="approve_at" {{request()->input('sort') == "approve_at"?"selected":""}}>За датою підтвердження</option>
                        <option value="violation_time" {{request()->input('sort') == "violation_time"?"selected":""}}>За датою порушення</option>
                    </select>
                </div>

            </div>
            <div class="row">
                <div class="col col-12 col-sm-4 mb-3">
                    <button class="btn btn-primary btn-lg btn-block " type="submit">Шукати</button>
                </div>
            </div>

        </form>

        <h1>
            Головна
        </h1>
        @if($requests->isEmpty())
            <p class="align-content">
                Не знайдено жодної скарги
            </p>

        @else
            @foreach ($requests as $request)
                <h2><a href="/request/{{$request->id}}" class="">{{ $request->place }}</a></h2>
                <p>{{$request->violationSphere->description }}</p>
                <div>
                    <span class="badge">Дата порушення: {{  Carbon\Carbon::parse($request->violation_time)->format('Y-m-d') }}</span>
                </div>
                <hr>
            @endforeach
        @endif


    </div>

    {{ $requests->links('pagination::bootstrap-4') }}

    <script>
        var today = new Date();
        var dd = String(today.getDate() + 1).padStart(2, '0');
        var mm = String(today.getMonth() + 1).padStart(2, '0'); //January is 0!
        var yyyy = today.getFullYear();

        tommorow = yyyy + '-' + mm + '-' + dd;

        $.datetimepicker.setLocale('uk');
        $('#violation_time').datetimepicker({
            datepicker:true,
            timepicker:false,
            setEndDate: tommorow,
            setStartDate: "2020-01-01",
            format: 'Y-m-d'
        });
        $('#created_at').datetimepicker({
            datepicker:true,
            timepicker:false,
            setEndDate: tommorow,
            setStartDate: "2020-01-01",
            format: 'Y-m-d'
        }).on('change', function(ev){
            $('#created_at').value(ev.target.value);
        });

    </script>

@endsection
