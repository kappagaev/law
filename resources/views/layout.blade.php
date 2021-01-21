<html>
<head>
    @isset($title)
        <title>{{$title}}</title>
    @endisset
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-datetimepicker/2.5.20/jquery.datetimepicker.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-datetimepicker/2.5.20/jquery.datetimepicker.full.min.js"></script>
</head>
<body>
<div class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 bg-white border-bottom box-shadow">
    <h5 class="my-0 mr-md-auto font-weight-normal">Mova team</h5>
    <nav class="my-2 my-md-0 mr-md-3">
        <a class="p-2 text-dark" href="/">Скарги</a>
        <a class="p-2 text-dark" href="/about">Про нас</a>

        @if( !Auth::check())

            <a href="/registration" class="btn btn-dark">
                Реєстрація
            </a>
        @endif


    @auth
            <a class="p-2 text-dark" href="/profile">Вітаю, {{auth()->user()->name}}</a>

        @if( Auth::user()->role_id == 3)
                <a class="p-2 text-dark" href="/admin">Адмінка</a>

        @endif

        <a class="btn btn-primary" href="/logout">Вийти</a>
    @endauth
    @guest
        <a class="btn btn-primary" href="/login">Логін</a>
    @endguest
    </nav>
</div>
@if(session('message'))
    <div class="container">
        <div class="alert alert-primary">
            {{ session('message') }}
        </div>
    </div>
@endif

<div class="container">
    @yield('content')
</div>
</body>
</html>
