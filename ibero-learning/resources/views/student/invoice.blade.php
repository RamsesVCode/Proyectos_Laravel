<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1 style="color:red;">Lista de usuarios</h1>
    <table border=1 cellspacing=0 cellpadding="10px">
        <tr>
            <th>Id</th>
            <th>Role</th>
            <th>Name</th>
            <th>email</th>
            <th>Password</th>
            <th>Fecha Registro</th>
        </tr>
        @foreach ($users as $user)
            <tr>
                <td>{{$user->id}}</td>
                <td>{{$user->role}}</td>
                <td>{{$user->name}}</td>
                <td>{{$user->email}}</td>
                <td>{{$user->password}}</td>
                <td>{{$user->created_at}}</td>
            </tr>
        @endforeach    
    </table>
    {{-- <img src="{{$path}}" alt=""> --}}
</body>
</html>