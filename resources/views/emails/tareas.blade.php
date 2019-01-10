<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    
    <div style="text-align:center;width: 800px;margin: 0 auto;">
        <img src="http://h2a.com.co/wp-content/uploads/2018/12/logo-h2a-group.png" alt="">

        <p>Hola {{ $info['user']['name'] }}</p>

        <p style="text-align:left;">
        Tienes una nueva tarea asignada en H2A GROUP.<br><br>

        Nombre: <strong>{{$info['task']['name']}}</strong><br>
        Descripción: {{$info['task']['description']}} <br>
        Fecha de entrega: {{$info['task']['fecha_fin']}} <br><br>

        <i>¡Feliz día!</i>
        </p> 
        {{-- Nombre: {{ $info->task->name}} --}}
        {{-- <strong>{{!!$name!!}}</strong> --}}
    </div>


</body>
</html>