@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Detalles de la Orden</h1>

        <p><strong>Número de Factura:</strong> {{ $orden->numeroFactura }}</p>
        <p><strong>Estado:</strong> {{ $orden->estadoOrden }}</p>
        <p><strong>Cliente:</strong> {{ $orden->cliente->nombre }}</p>
        <p><strong>Fecha de Creación:</strong> {{ $orden->fechaCreacion->format('Y-m-d H:i:s') }}</p>
        <p><strong>Dirección de Entrega:</strong> {{ $orden->direccionEntrega }}</p>
        <p><strong>Nota Adicional:</strong> {{ $orden->notaAdicional }}</p>

        <a href="{{ route('ordenes.index') }}">Volver a la lista de órdenes</a>
    </div>
@endsection
