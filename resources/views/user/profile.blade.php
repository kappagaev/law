@extends('layout')
@section('content')
    <div class="container">

        <h1>{{ $user->name }}</h1>
        {{--            <p>{{ Str::limit($request->content, 10) }}</p>--}}

        <hr>



    </div>
@endsection
