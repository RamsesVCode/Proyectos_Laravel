<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Email de Notificación</title>
    <style>
        h2{
            text-align: center;
        }
    </style>
</head>
<body>
    <h1>Hola {{$teacher->name}}, el alumno {{$student->name}} ha comprado tu curso {{$course->title}} 
        por el importe de {{$course->price}}</h1>
    !Felicidades¡
    <a href="/">Volver a la plataforma</a>
    Atentamente,
    {{config("app.name")}}
</body>
</html>