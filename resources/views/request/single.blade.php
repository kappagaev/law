@extends('layout')
@section('content')
    <div class="container">
        <h1>{{ $request->title }}</h1>
        <p>Автор <a href="/user/{{request->$user->id}}">{{ $request->user->name }}</a></p>
        <p>{{$request->content}}</p>
        <div>
            <span class="badge">{{ $request->created_at }}</span>

        </div>
        <hr>



    </div>
@endsection
