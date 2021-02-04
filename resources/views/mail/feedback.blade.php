<html>
<head>
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
</head>
<body>
    <div class="container">
        <div class="row">
            <h1>
                Зворотній зв'язок
            </h1>
        </div>
        <div class="row">
            <div class="col">
                ПІБ: {{ $feedback->name }}
            </div>
            <div class="col">
                Електронна скринька: {{ $feedback->email }}
            </div>
        </div>
        <div class="row">
            <div class="col">
                {{ $feedback->message }}
            </div>
        </div>

    </div>

</body>
</html>
