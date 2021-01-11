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
            <h4 class="mb-3">Створити Вид порушення</h4>
            <form class="form-horizontal" role="form" method="post" action="/admin/violation/type" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="description">Опис</label>
                    <textarea class="form-control" rows="4" name="description" value="{{old('description')}}"></textarea>

                </div>
                <div class="mb-3">
                    <label for="violation_sphere_id">Сфера</label>
                    <select class="form-control" id="sel1" name="violation_sphere_id">

                        @foreach ($spheres as $sphere)
                            <option value="{{$sphere->id}}">{{$sphere->description}}</option>

                        @endforeach
                    </select>

                </div>


                <button class="btn btn-primary btn-lg btn-block" type="submit">Відправити</button>
            </form>
        </div>



@endsection
