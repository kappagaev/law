@extends('layout')
@section('content')
    <div class="container">

        <h1>{{ $user->full_name }}</h1>
        {{--            <p>{{ Str::limit($request->content, 10) }}</p>--}}

        <hr>
        @foreach ($requests as $request)
            <h2><a href="/request/{{$request->id}}" class="">{{ $request->title }}</a></h2>
            <p>{{ Str::limit($request->content, 10) }}</p>
            <div>
                <span class="badge">{{ $request->created_at }}</span>
            </div>
            <hr>
        @endforeach
        {{ $requests->links('pagination::bootstrap-4') }}
    </div>
@endsection
