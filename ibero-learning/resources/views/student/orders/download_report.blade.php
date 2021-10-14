<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reporte de pedidos</title>
    <style>
        *{
            font-family: Arial, Helvetica, sans-serif;
        }
        h1{
            float: left;
            color:crimson;
        }
        p{
            float:right;
            font-weight: bold; 
        }
        span{
            color:black;
        }
        .title{
            color:crimson;
            clear: both;
            text-align: center;
            text-transform: uppercase;
            letter-spacing: 3px;
        }
        .container{
            width:85%;
            margin:0 auto;
        }
        table{
            width:100%;
            text-align: center;
        }
        thead{
            border-radius: 8px 8px 0 0;
            color:white;
            background-color:black;
        }
        tbody tr:nth-child(even){
            background-color:#ccc;
        }
        .footer{
            display: inline-block;
            font-size: 30px;
        }
        .text{
            float: left;
        }
        .coste{
            float: right;
        }
        .boot{
            clear:both;
        }
    </style>
</head>
<body>
    <header>
        <h1>IBERO <span>LEARNING</span></h1>
        <p>{{now()}}</p>
    </header>
    <section>
        <h2 class="title">Reporte de Pedidos Realizados</h2>
    </section>
    <section id="tablas">
        <div class="container">
            <table border=1 cellspacing=0 cellpadding="8px">
                <thead>
                    <tr>
                        <td>Id</td>
                        <td>Cupón aplicado</td>
                        <td>Total pagado</td>
                        <td>Estado</td>
                        <td>Fecha del pedido</td>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($orders as $order)
                        <tr>
                            <td>{{$order->id}}</td>
                            <td>{{$order->cupon ?? "Ningúno"}}</td>
                            <td>{{$order->total_amount}}</td>
                            <td>{{$order->status}}</td>
                            <td>{{$order->created_at}}</td>
                        </tr>                        
                    @endforeach
                </tbody>
            </table>
            <div class="footer">
                <p class="text">Total invertido: </p>
                <p class="coste">{{$totalOrder}} $</p>
            </div>
            <br>
            <div class="footer boot">
                <p class="text">Total pedidos: </p>
                <p class="coste">{{auth()->user()->orders->count()}}</p>
            </div>
        </div>
    </section>
    <section>
        <div class="container">
            <h2 class="title">Reporte individual de ordenes</h2>
            <p>Cursos Adquiridos</p>
            @foreach ($orders as $order)
                <div>
                    <h2>Order # {{$order->id}}</h2>
                    <div>
                        @foreach ($order->orderlines as $linea)
                            {{$linea->course->title}}
                            {{$linea->price}}<br/>
                        @endforeach
                    </div>
                </div>
            @endforeach
        </div>
    </section>
</body>
</html>