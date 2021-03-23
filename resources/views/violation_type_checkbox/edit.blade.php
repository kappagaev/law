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
        <div class="col-md-8 order-md-1">
            <h4 class="mb-3">Редагувати чекбокс для виду порушення: {{ $checkbox->violationType->description }}</h4>
            <form class="form-horizontal" role="form" method="post" action="/admin/violation/type/checkbox/{{$checkbox->id}}" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="_method" value="PATCH">
                <input type="hidden" name="violation_type_id" value="{{$checkbox->violationType->id}}">
                <div class="mb-3">
                    <label for="description">Опис</label>
                    <textarea class="form-control" rows="4" name="description">{{$checkbox->description}}</textarea>

                </div>



                <button class="btn btn-primary btn-lg btn-block" type="submit">Відправити</button>
            </form>
        </div>



@endsection
