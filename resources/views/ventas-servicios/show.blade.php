@extends('home')
@section('title', 'Solicitud')

@section('servicio','active')

@section('css-derecha')
<link rel="stylesheet" href="{{asset('css/table-information.css')}}">
@endsection

@section('contenido')
<div class="container-fluid">
    <div class="row">
        <div class="tabla" style="padding: 3rem;">
            <h1>Venta de Servicio</h1>
            {{-- <strong>Nombre del cliente: {{ $solicitud->cliente->persona->nombre .
                                        ' ' .
                                        $solicitud->cliente->persona->apellido_paterno .
                                        ' ' .
                                        $solicitud->cliente->persona->apellido_materno }}</strong>
            <p> --}}
                <strong>Tipo de servicio</strong>: @if ($solicitud->id_servicio)
                {{ $solicitud->servicio->nombre }}
                @else
                ninguno
                @endif
                <br>
                <strong>Mascota</strong>: {{$solicitud->mascota->nombre}} <br>
                <strong>ID Venta</strong>: {{$solicitud->id_venta}} <br>
                <strong>Concepto</strong>: {{$solicitud->venta->concepto}} <br>
                <strong>Monto total</strong>: {{$solicitud->venta->total}} <br>
            </p>
            <hr>
            <div class="col">
                <a href="{{route('ventas-servicios.pdf',$solicitud)}}" class="buttonRegistrame">Exportar PDF</a>
                <a href="{{route('ventas-servicios.index')}}" class="buttonRegistrame">Volver Atras</a>
            </div>
        </div>
    </div>
</div>
@endsection