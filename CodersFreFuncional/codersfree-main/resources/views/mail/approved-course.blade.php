<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Maileable</title>

    <style>
      h2{
        color: blue;
      }
    </style>

  </head>
  <body>
    <h2>Este es un aviso importante para usted: <strong>{{$course->teacher->name}}</strong></h1>

    <div class="flex">
      <p>Se ha aprobado con exito, el curso: </p>      
      <a href={{asset('cursos/'.$course->slug)}}><strong>{{$course->title}}</strong></a>
    </div>  
  </body>
</html>