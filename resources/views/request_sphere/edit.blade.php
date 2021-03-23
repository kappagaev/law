@extends('admin-layout')

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
            <h4 class="mb-3">Створити Сферу порушення</h4>
            <form class="form-horizontal" role="form" method="post" action="/admin/violation/sphere" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="description">Скорочений запис*</label>
                    <textarea class="form-control" rows="4" name="description" required>{{$sphere->description}}</textarea>

                </div>
                <div class="mb-3">
                    <label for="description">Опис*</label>
                    <textarea class="form-control" rows="4" name="full_description" required>{{$sphere->full_description}}</textarea>

                </div>


                <button class="btn btn-primary btn-lg btn-block" type="submit">Відправити</button>
            </form>
        </div>



@endsection
