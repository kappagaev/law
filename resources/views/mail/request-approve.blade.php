<html>
<head>
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col">
            Повідомляємо Вам, що ваша скагра № {{$request->id}} надіслана на адресу Уповноваженого із захисту державної мови
            <a href="https://mova.team/request/{{$request->id}}">Посилання на скаргу</a>
        </div>

    </div>


</div>

</body>
</html>
