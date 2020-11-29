@extends('layout')
@section('content')
    <div class="container">
        <h1>
            123
        </h1>
        @foreach ($requests as $request)
            <h2><a href="/request/{{$request->id}}" class="">{{ $request->title }}</a></h2>
            <p>{{ Str::limit($request->content, 270) }}</p>
            <div>
                <span class="badge">{{ $request->created_at }}</span><span class="badge"><a href="/user/{{$request->user->id}}" class="">Автор {{ $request->user->name }}</a></span>
            </div>
            <hr>
        @endforeach


    </div>

    {{ $requests->links('pagination::bootstrap-4') }}
@endsection
