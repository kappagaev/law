@extends('layout')

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
            <div class="col-md-8 order-md-1">
                <h4 class="mb-3">Створити скаргу/заяву</h4>
                <form class="form-horizontal" role="form" method="post" action="/request" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="title">Заголовок</label>
                        <input type="text" id="title" placeholder="Заголовок" class="form-control" autofocus="" name="title" value="" required>
                        <div class="invalid-feedback">
                            123
                        </div>
                    </div>



                    <div class="mb-3">
                        <label for="violation_subj">1.1 Сфера порушення</label>
                        <select class="form-control" id="sphere" name="violation_sphere_id">
                            <option>Виберіть сферу порушення</option>
                            @foreach ($spheres as $sphere)
                                <option value="{{$sphere->id}}">{{$sphere->description}}</option>

                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="violation_subj">1.2 Вид порушення</label>
                        <select class="form-control" id="type" name="violation_type_id">

                        </select>
                    </div>
                    <div class="mb-3" id="checkboxes">

                    </div>
                    <div class="mb-3">
                        <label for="violation_subj">2.Суб’єкт порушення</label>
                        <input type="text" id="violation_subj" placeholder="Суб’єкт порушення" name="violation_subj" class="form-control" value="{{old('violation_subj')}}" required>
                        <div class="invalid-feedback">
                            Valid last name is required.
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="username">3.Прізвище, ім’я, по батькові порушника (якщо воно відоме): </label>
                        <div class="input-group">

                            <input type="text" id="violator" placeholder="violator" class="form-control"  name="violator" value="{{old('violator')}}" required>
                            <div class="invalid-feedback" style="width: 100%;">
                                Your username is required.
                            </div>
                        </div>
                    </div>


                    <div class="mb-3">
                        <label for="violation_subj">4.1 Регіон порушення</label>
                        <select class="form-control" id="region" name="region_id">
                            <option>Виберіть регіон порушення</option>
                            @foreach ($regions as $region)
                                <option value="{{$region->id}}">{{$region->name}}</option>

                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="violation_subj">4.2 Область порушення</label>
                        <select class="form-control" id="district" name="district_id">

                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="violation_subj">4.3 Населений пункт порушення</label>
                        <select class="form-control" id="settlement" name="settlement_id">

                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="email">4.4 Місце порушення</label>
                        <input type="text" id="place" placeholder="place" class="form-control"  name="place" value="{{old('place')}}" required>
                        <div class="invalid-feedback">
                            Please enter a valid email address for shipping updates.
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="place">4.5.	Назва органу державної влади, органу місцевого самоврядування, підприємства, установи, чи організації</label>
                        <input type="text" id="place" placeholder="Назва органу державної влади, органу місцевого самоврядування, підприємства, установи, чи організації" class="form-control"  name="place" value="{{old('place')}}">
                        <div class="invalid-feedback">
                            Please enter your shipping address.
                        </div>
                    </div>



                    <div class="mb-3">
                        <label for="place_code">4.6.	Код ЄДРПОУ (з наявності)</label>
                        <input type="text" id="place_code" placeholder="place_code" class="form-control"  name="place_code" value="{{old('place_code')}}">
                        <div class="invalid-feedback">
                            Please enter your shipping address.
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="place_address">4.7.	Адреса розташування де відбулось порушення</label>
                        <input type="text" id="place_address" placeholder="place_address" class="form-control"  name="place_address" value="{{old('place_address')}}">
                        <div class="invalid-feedback">
                            Please enter your shipping address.
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="violation_time">5.	Дата і час порушення</label>

                    </div>
                    <div class="mb-3">
                        <input id="datetimepicker" type="text" class=""  name="violation_time" value="{{old('violation_time')}}" >

                        <div class="invalid-feedback">
                            Please enter your shipping address.
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="address2">6. Обставини порушення</label>
                        <textarea class="form-control" rows="4" name="content" value="{{old('content')}}"></textarea>

                    </div>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text">Фотокопія документа</span>
                        </div>
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" name="photocopy[]" multiple>
                            <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                        </div>

                    </div>

                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text">Аудіозапис</span>
                        </div>
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" name="audio[]" multiple>
                            <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                        </div>

                    </div>

                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text">Відеозапис</span>
                        </div>
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" name="video[]" multiple>
                            <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                        </div>

                    </div>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text">Фотокопія установчих та реєстраційних документів</span>
                        </div>
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" name="reg_photocopy[]" multiple>
                            <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                        </div>

                    </div>

                    <script>
                        $.datetimepicker.setLocale('ua');
                        $('#datetimepicker').datetimepicker({
                            datepicker:true,
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
                            inline:true,
                            format: 'Y-m-d H:i:s'
                        });
                    </script>

                    <hr class="mb-4">
                    <button class="btn btn-primary btn-lg btn-block" type="submit">Відправити</button>
                </form>
            </div>

            <script src="{{asset('js/request-create.js')}}"></script>
@endsection
