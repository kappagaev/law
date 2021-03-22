<html>
<head>
    @isset($title)
        <title>{{$title}}</title>
    @endisset
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/bootstrap.theme.css') }}" rel="stylesheet">
    <link href="{{ asset('css/site.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-datetimepicker/2.5.20/jquery.datetimepicker.css">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-datetimepicker/2.5.20/jquery.datetimepicker.full.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/i18n/uk.js"></script>
    <script src="{{ asset('js/site.js') }}"></script>
</head>
<body>

<div class="navbar navbar-dark bg-primary navbar-expand-lg d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 bg-white border-bottom box-shadow">
    <h5 class="my-0 mr-md-auto font-weight-normal"><a class="text-dark" href="/"><img class="logo" src="/img/logo.png" /></a></h5>
    <button class="navbar-toggler btn-primary btn" type="button" data-trigger="#main_nav">
        <span class="navbar-toggler-icon"></span>
    </button>
    <nav class="my-2 my-md-0 mr-md-3 navbar-collapse order-3    " id="main_nav">
        <div class="offcanvas-header mt-3">
            <button class="btn btn-outline-danger btn-close float-right"> &times Закрити </button>
            <h5 class="py-2 text-primary">Головне меню</h5>
        </div>
        <div class="collapse w-100 order-3 dual-collapse2">
            <ul class="navbar-nav ml-auto navbar-right">
                <li class="nav-item active"> <a class="p-2 text-dark nav-link" href="/">Всі повідомлення про порушення</a> </li>
                <li class="nav-item active"> <a class="p-2 text-dark nav-link" href="/about">Про проєкт</a> </li>
                <li class="nav-item active"> <a class="p-2 text-dark nav-link" href="/feedback">Зворотній зв'язок</a> </li>
                <li class="nav-item active"> <a class="p-2 text-dark nav-link" href="/donate">Підтримати проєкт</a> </li>

            @isset($registration)

                <li class="nav-item active"><a class="p-2 btn btn-primary" href="/">Вийти</a></li>

            @endisset
            @if(!isset($fakeLogin))
                @if( !Auth::check())
                <li class="nav-item active"><a href="/registration" class="p-2 btn btn-primary mr-2 mb-2 mb-sm-0">
                        Реєстрація
                    </a></li>
                <li class="nav-item active"><a href="/auth/office365/redirect" class="p-2 btn btn-success">
                        Логін
                    </a></li>
                @endif


                @auth
                <li class="nav-item active"> <a class="p-2 text-dark nav-link" href="/profile">Особистий профіль</a></li>
                <li class="nav-item active"> <a class="p-2 btn btn-outline-dark mr-2 mb-2 mb-sm-0" href="/request/create">Подати повідомлення про порушення</a></li>
                    @if( Auth::user()->role_id == 3)
                <li class="nav-item active"> <a class="p-2 btn btn-info mr-2 mb-2 mb-sm-0" href="/admin">Адмінка</a></li>

                    @endif

                <li class="nav-item active"><a class="p-2 btn btn-primary" href="/logout">Вийти</a></li>
                @endauth


            @endif

            </ul>
        </div>

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

<script src="{{asset('js/request-create.js')}}"></script>
<script src="/js/select.js"></script>

</body>
</html>
