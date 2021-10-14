<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Email de Agradecimiento</title>
    <style>
        h2{
            text-align: center;
        }
    </style>
</head>
<body>
    <h1>Hola {{$user->name}}</h1>
    Muchas gracias por haber realizado tu pedido en {{config('app.name')}}
    Aqui tienes los datos de tu pedido:
    <ul>
        @foreach ($order->orderlines as $line)
            <li>
                    Curso:{{$line->course->title}} - Precio: {{$line->price}}
            </li>
        @endforeach
    </ul>
    <a href="/">Volver a la plataforma</a>
    Atentamente,
    {{config("app.name")}}
    <a href="{{route('student.orders.download_report')}}">{{ __("Descargar reporte") }}</a>
</body>
</html>