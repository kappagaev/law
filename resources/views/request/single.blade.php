@extends('layout')
@section('content')
    <div class="container">
            <h1>{{ $request->title }}</h1>
            {{--            <p>{{ Str::limit($request->content, 10) }}</p>--}}
            <div>
                <span class="badge">{{ $request->created_at }}</span>

            </div>
            <hr>



    </div>
@endsection
