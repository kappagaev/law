@extends('layout')

@section('content')
    <div class="container">
        <form class="form-horizontal" role="form" method="post" action="/request">
            @csrf
            <h2>Registration</h2>
            <div class="form-group">
                <label for="firstName" class="col-sm-3 control-label">Title*</label>
                <div class="col-sm-9">
                    <input type="text" id="title" placeholder="title" class="form-control" autofocus name="title" value="{{old('title')}}">
                </div>
            </div>


            <div class="form-group">
                <div class="col-sm-9 col-sm-offset-3">
                    <span class="help-block">*Required fields</span>
                </div>
            </div>
            <button type="submit" class="btn btn-primary btn-block">Register</button>
        </form> <!-- /form -->
    </div> <!-- ./container -->
@endsection
