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
            <h4 class="mb-3">Створити чекбокс для виду порушення: {{ $violationType->description }}</h4>
            <form class="form-horizontal" role="form" method="post" action="/admin/violation/type/checkbox" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="violation_type_id" value="{{$violationType->id}}">
                <div class="mb-3">
                    <label for="description">Опис</label>
                    <textarea class="form-control" rows="4" name="description" value="{{old('description')}}" required></textarea>

                </div>



                <button class="btn btn-primary btn-lg btn-block" type="submit">Відправити</button>
            </form>
        </div>



@endsection
