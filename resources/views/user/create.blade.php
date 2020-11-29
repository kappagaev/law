@extends('layout')

@section('content')
    <div class="container">
        <form class="form-horizontal" role="form" method="post" action="/user">
            @csrf
            <h2>Registration</h2>
            <div class="form-group">
                <label for="firstName" class="col-sm-3 control-label">Name*</label>
                <div class="col-sm-9">
                    <input type="text" id="firstName" placeholder="Name" class="form-control" autofocus name="name" value="{{old('name')}}">
                </div>
            </div>
            <div class="form-group">
                <label for="email" class="col-sm-3 control-label">Email* </label>
                <div class="col-sm-9">
                    <input type="email" id="email" placeholder="Email" class="form-control" name= "email" value="{{old('email')}}">
                </div>
            </div>
            <div class="form-group">
                <label for="password" class="col-sm-3 control-label">Password*</label>
                <div class="col-sm-9">
                    <input type="password" id="password" placeholder="Password" class="form-control" name="password">
                </div>
            </div>
            <div class="form-group">
                <label for="password" class="col-sm-3 control-label">Confirm Password*</label>
                <div class="col-sm-9">
                        <input type="password" id="password" placeholder="Password" class="form-control" name="password_confirmation">
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
