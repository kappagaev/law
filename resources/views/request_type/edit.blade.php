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
            <h4 class="mb-3">Редагувати Вид порушення</h4>
            <form class="form-horizontal" role="form" method="post" action="/admin/violation/type/{{$type->id}}" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="_method" value="PATCH">
                <div class="mb-3">
                    <label for="description">Опис*</label>
                    <textarea class="form-control" rows="4" name="description" required>{{$type->description}}</textarea>

                </div>
                <div class="mb-3">
                    <label for="violation_sphere_id">Сфера*</label>
                    <select class="form-control select2" id="sel1" name="violation_sphere_id" required>

                        @foreach ($spheres as $sphere)
                            <option value="{{$sphere->id}}" {{$type->violation_sphere_id == $sphere->id?"selected":""}}>{{$sphere->description}}</option>

                        @endforeach
                    </select>

                </div>


                <button class="btn btn-primary btn-lg btn-block" type="submit">Відправити</button>
            </form>
        </div>


        <script src="{{asset('js/select.js')}}"></script>
@endsection
