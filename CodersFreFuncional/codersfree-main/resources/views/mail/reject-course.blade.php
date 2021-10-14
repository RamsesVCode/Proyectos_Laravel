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

      <p>Se ha rechazado su curso por los siguientes motivos: </p>      
      
      <h3>Motivo del rechazo</h3>
      {!!$course->observation->body!!}
      
      <div class="flex">
        <p>Acceda a su curso: </p>
        <a href={{asset('instructor/courses/'.$course->slug.'/edit')}}><strong>{{$course->title}}</strong></a>
      </div>  
      
  </body>
</html>