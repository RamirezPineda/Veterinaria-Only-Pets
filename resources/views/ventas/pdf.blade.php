<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{public_path('css/table-information.css')}}" type="text/css">
    <title>Recibo</title>
</head>

<body>
    <div class="tabla" style="padding: 3rem;">
        <h1>Venta de Producto</h1>
        <strong>ID Venta: {{ $venta->venta->id }}</strong>
        <p>
            <strong>Producto :</strong>: @if ($venta->producto->nombre)
            {{ $venta->producto->nombre }}
            @else
            ninguno
            @endif
            <br>
            <strong>Cantidad :</strong>: {{$venta->cantidad}} <br>
            <strong>Monto Total :</strong>: {{$venta->monto}} <br>
        </p>
    </div>
</body>

</html>