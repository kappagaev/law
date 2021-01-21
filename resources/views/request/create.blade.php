@extends('layout')

@section('content')
    <div class="container">
        @if ($errors->any())
            <br>
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
                        <label for="title">Заголовок*</label>
                        <input type="text" id="title" placeholder="Заголовок" class="form-control" name="title" value="{{old('title')}}" required>
                        <div class="invalid-feedback">
                            123
                        </div>
                    </div>



                    <div class="mb-3">
                        <label for="violation_subj">1.1 Сфера порушення*</label>
                        <select class="form-control" id="sphere" name="violation_sphere_id" required data-sphere-id="{{old('violation_sphere_id')}}">
                            <option>Виберіть сферу порушення</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="violation_subj">1.2 Вид порушення*</label>
                        <select class="form-control" id="type" name="violation_type_id" required data-type-id="{{old('violation_type_id')}}">

                        </select>
                    </div>
                    <div class="mb-3" id="checkboxes" data-checkboxes="
                        @if(old('checkboxes'))

                             @for( $i =0; $i < count(old('checkboxes')); $i++)
                               {{ old('checkboxes.'.$i)}}
                                @if($i + 1 != count(old('checkboxes')))
                                    ,
                                @endif

                            @endfor

                        @endif
                ">
                        {{old('checkboxes.0')}}
                    </div>
                    <div class="mb-3">
                        <label for="violation_subj">2.Суб’єкт порушення*</label>
                        <input type="text" id="violation_subj" placeholder="Суб’єкт порушення" name="violation_subj" class="form-control" value="{{old('violation_subj')}}" required>
                        <div class="invalid-feedback">
                            Valid last name is required.
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="username">3.Прізвище, ім’я, по батькові порушника (якщо воно відоме): </label>
                        <div class="input-group">

                            <input type="text" id="violator" placeholder="Прізвище, ім’я, по батькові порушника" class="form-control"  name="violator" value="{{old('violator')}}">
                            <div class="invalid-feedback" style="width: 100%;">
                                Your username is required.
                            </div>
                        </div>
                    </div>


                    <div class="mb-3">
                        <label for="violation_subj">4.1 Область порушення*</label>
                        <select class="form-control" id="region" name="region_id" data-region-id="{{old('region_id')}}" required>

                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="violation_subj">4.2 Регіон порушення*</label>
                        <select class="form-control" id="district" name="district_id" data-district-id="{{old('district_id')}}" required>

                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="violation_subj">4.3 Населений пункт порушення*</label>
                        <select class="form-control" id="settlement" name="settlement_id" data-settlement-id="{{old('settlement_id')}}"  required>

                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="place">4.4.	Назва органу державної влади, органу місцевого самоврядування, підприємства, установи, чи організації*</label>
                        <input type="text" id="place" placeholder="Назва органу державної влади, органу місцевого самоврядування, підприємства, установи, чи організації" class="form-control"  name="place" value="{{old('place')}}" required>
                        <div class="invalid-feedback">
                            Please enter your shipping address.
                        </div>
                    </div>



                    <div class="mb-3">
                        <label for="place_code">4.5. Код ЄДРПОУ (з наявності)</label>
                        <input type="text" id="place_code" placeholder="Код ЄДРПОУ" class="form-control"  name="place_code" value="{{old('place_code')}}">
                        <div class="invalid-feedback">
                            Please enter your shipping address.
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="place_address">4.6.	Адреса розташування де відбулось порушення*</label>
                        <input type="text" id="place_address" placeholder="Адреса розташування де відбулось порушення" class="form-control"  name="place_address" value="{{old('place_address')}}" required>
                        <div class="invalid-feedback">
                            Please enter your shipping address.
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="violation_time">5.	Дата і час порушення*</label>

                    </div>
                    <div class="mb-3">
                        <input id="datetimepicker" type="text" class=""  name="violation_time" value="{{old('violation_time')}}" >

                        <div class="invalid-feedback">
                            Please enter your shipping address.
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="address2">6. Обставини порушення*</label>
                        <textarea value="" class="form-control" rows="4" placeholder="Обставини порушення" name="content"  required>{{old('content')}}</textarea>

                    </div>
                    <div class="input-group mb-3">
                        <div class="form-group">
                            <label for="exampleFormControlFile1">Фотокопія документа</label>
                            <input type="file" class="form-control-file" id="exampleFormControlFile1" name="photocopy[]" multiple>
                        </div>

                    </div>

                    <div class="input-group mb-3">
                        <div class="form-group">
                            <label for="exampleFormControlFile1">Аудіозапис</label>
                            <input type="file" class="form-control-file" id="exampleFormControlFile1" name="audio[]" multiple>
                        </div>

                    </div>

                    <div class="input-group mb-3">
                        <div class="form-group">
                            <label for="exampleFormControlFile1">Відеозапис</label>
                            <input type="file" class="form-control-file" id="exampleFormControlFile1" name="video[]" multiple>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <div class="form-group">
                            <label for="exampleFormControlFile1">Фотокопія установчих та реєстраційних документів</label>
                            <input type="file" class="form-control-file" id="reg_photocopy" name="reg_photocopy[]" multiple>
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
