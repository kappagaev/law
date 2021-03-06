<html>
<head>
    @isset($title)
        <title>{{$title}}</title>
    @endisset
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
        <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="/">Головна</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarText">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item">
               <span class="nav-link">Вітаю, {{auth()->user()->name}}</span>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/admin">Користувачі</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/admin/violation/type">Види порушень</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/admin/violation/sphere">Сфери порушень</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/admin/requests">Звернення </a>
            </li>
{{--            <li class="nav-item">--}}
{{--                <a class="nav-link" href="/admin/registrations">Реєстрації</a>--}}
{{--            </li>--}}
            <li class="nav-item">
                <a class="nav-link" href="/admin/requests/approve">Апрув зверень</a>
            </li>
            <li class="nav-item">
                <a class="btn btn-primary" href="/logout">Вийти</a>
            </li>
        </ul>
        <span class="navbar-text">

    </span>
    </div>
</nav>
@if(session('message'))
    <div class="container">
        <div class="alert alert-primary">
            {{ session('message') }}
        </div>
    </div>
@endif


    @yield('content')

</body>
</html>
