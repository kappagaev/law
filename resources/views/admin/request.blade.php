@extends('layout')
@section('content')
    <div class="container">
        <h7>
            <b> Автор:</b> <a href="/admin/user/{{$request->user->id}}" class="">{{$request->user->full_name}}</a>
        </h7>
        <hr>
        <h7>
            <b>Вид порушення</b>
        </h7>
        <p>
            {{$request->violationSphere->description }} {{$request->violationType->description}}
            @foreach($request->checkboxes as $checkbox)
                {{$checkbox->description}};
            @endforeach
        </p>
        <h7>
           <b> Прізвище, ім’я, по батькові порушника (якщо воно відоме):</b> {{$request->violator}}
        </h7>
        <br>
        <h7>
            <b> Місце порушення:</b>
        </h7>
        <p>
            <b> 1. Назва органу державної влади, органу місцевого самоврядування, підприємства, установи, чи організації: </b>  {{$request->place}}
        </p>
        <p>
            <b> 2. Код ЄДРПОУ (за наявності)</b> {{$request->place_code}}
        </p>
        <p>
            <b> 3.	Адреса розташування де відбулось порушення</b> {{$request->full_address}}
        </p>
        <p>
            <b>	Дата і час порушення: </b> {{ $request->violation_time}}
        </p>

        <h7>
            <b>	Обставини порушення</b>
        </h7>
        <p>{{$request->content}}</p>
        @if($request->photocopy)
            <div class="input-group mb-3">
                <div class="form-group">
                    <label for="exampleFormControlFile1">Фотокопія документа</label>
                   <p> @foreach($request->photocopy as $key => $photocopy)
                           <a href="/photocopy/{{$photocopy}}">{{$photocopy}}</a><br>

                       @endforeach</p>
                </div>

            </div>
        @endif

        @if($request->audio)
            <div class="input-group mb-3">
                <div class="form-group">
                    <label for="exampleFormControlFile1">Аудіозапис</label>
                    <p> @foreach($request->audio as $key => $audio)
                            <a href="/photocopy/{{$audio}}">{{$audio}}</a><br>

                        @endforeach</p>
                </div>

            </div>
        @endif

        @if($request->video)
            <div class="input-group mb-3">
                <div class="form-group">
                    <label for="exampleFormControlFile1">Відеозапис</label>
                    <p> @foreach($request->video as $key => $video)
                            <a href="/photocopy/{{$video}}">{{$video}}</a><br>

                        @endforeach</p>
                </div>

            </div>
        @endif

        @if($request->reg_photocopy)
            <div class="input-group mb-3">
                <div class="form-group">
                    <label for="exampleFormControlFile1">Фотокопія установчих та реєстраційних документів</label>
                    <p> @foreach($request->reg_photocopy as $key => $reg_photocopy)
                            <a href="/photocopy/{{$reg_photocopy}}">{{$reg_photocopy}}</a><br>

                        @endforeach</p>
                </div>

            </div>
        @endif
        @if($request->witness_reg_photo)
            <div class="input-group mb-3">
                <div class="form-group">
                    <label for="exampleFormControlFile1">Фотокопія акта, підписаного свідками</label>
                    <p> @foreach($request->witness_reg_photo as $key => $witness_reg_photo)
                            <a href="/photocopy/{{$witness_reg_photo}}">{{$witness_reg_photo}}</a><br>

                        @endforeach</p>
                </div>

            </div>
        @endif
        <hr>
        <p><a href="/admin/request/{{$request->id}}/approve" class="btn btn-success">Схвалити</a>
            <a href="/admin/request/{{$request->id}}/disprove" class="btn btn-danger">Відхилити</a></p>
        <p></p>


        <div>
            <span class="badge">{{ $request->created_at }}</span>

        </div>
    </div>
@endsection
