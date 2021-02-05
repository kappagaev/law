@extends('layout')
@section('content')
    <div class="container">

        <h1>{{ $user->full_name }}</h1>
        {{--            <p>{{ Str::limit($request->content, 10) }}</p>--}}

        <hr>
        @foreach ($requests as $request)
            <h2><a href="/request/{{$request->id}}" class="">{{ $request->place }}</a></h2>
            <p>{{$request->violationSphere->description }}</p>
            <div>
                <span class="badge">Дата порушення: {{  Carbon\Carbon::parse($request->violation_time)->format('Y-m-d') }}</span>
            </div>
            <hr>
        @endforeach
        {{ $requests->links('pagination::bootstrap-4') }}
    </div>
@endsection
