<html>
<head>
    @isset($title)
        <title>{{$title}}</title>
    @endisset
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">

</head>
<body>
<div class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 bg-white border-bottom box-shadow">
    <h5 class="my-0 mr-md-auto font-weight-normal">Company name</h5>
    <nav class="my-2 my-md-0 mr-md-3">
        <a class="p-2 text-dark" href="/">Пропозиції</a>



    @auth
            <a class="p-2 text-dark" href="/user/{{ Auth::id() }}">Кабінет</a>
        @if( Auth::user()->role_id == 3)

                <a class="p-2 text-dark" href="/admin">Адмінка</a>

        @endif
        @if( Auth::user()->role_id == 1)

            <a href="googleform" class="btn">
                Форма
            </a>

        @endif

        <a class="btn btn-primary" href="/logout">Logout</a>
    @endauth
    @guest
        <a class="btn btn-primary" href="/login">Login</a>
        <a class="btn btn-outline-primary" href="/user/create">Sign up</a>
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
