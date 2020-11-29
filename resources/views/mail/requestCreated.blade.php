<html>
<head>
    @isset($title)
        <title>{{$title}}</title>
    @endisset
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">

</head>
<body>


    <div class="container">
        <h1>{{ $request->title }}</h1>
        <p>Автор {{ $request->user->name }}</p>
        <p>{{$request->content}}</p>
        <div>
            <span class="badge">{{ $request->created_at }}</span>

        </div>
        <hr>



    </div>
</body>
</html>
