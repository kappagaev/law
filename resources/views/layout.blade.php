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
    <h5 class="my-0 mr-md-auto font-weight-normal"><a class="text-dark" href="/">Mova team</a></h5>
    <nav class="my-2 my-md-0 mr-md-3">
        <a class="p-2 text-dark" href="/">Всі скарги</a>
        <a class="p-2 text-dark" href="/rules">Правила</a>
        <a class="p-2 text-dark" href="/about">Про проєкт</a>
        <a class="p-2 text-dark" href="/feedback">Зворотній зв'язок</a>
        <a class="p-2 text-dark" href="/donate">Підтримати проєкт</a>

        @if( !Auth::check())

            <a href="/auth/office365/redirect" class="btn btn-dark">
                Вхід через Office 365
            </a>
        @endif


    @auth
            <a class="p-2 text-dark" href="/profile">Вітаю, {{auth()->user()->name}}</a>
            <a class="btn btn-outline-dark" href="/request/create">Створити скаргу</a>
        @if( Auth::user()->role_id == 3)
                <a class="p-2 btn btn-info" href="/admin">Адмінка</a>

        @endif

        <a class="p-2 btn btn-primary" href="/logout">Вийти</a>
    @endauth
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
{{--<footer class="footer" style="    position: absolute;--}}
{{--    bottom: 0;--}}
{{--    width: 100%;--}}
{{--    height: 60px;--}}
{{--    line-height: 60px;--}}
{{--    background-color: #f5f5f5;">--}}
{{--    <!-- Copyright -->--}}
{{--    <div class="text-center p-3" >--}}
{{--        © 2021 Copyright:--}}
{{--        Фідо та Асоціація--}}
{{--    </div>--}}
{{--    <!-- Copyright -->--}}
{{--</footer>--}}
</body>
</html>
