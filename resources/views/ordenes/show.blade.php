@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">Detalles de la Orden</h1>
    <div class="card">
        <div class="card-body">
            <p><strong>Número de Factura:</strong> {{ $orden->numeroFactura }}</p>
            <p><strong>Estado:</strong> <span class="badge bg-primary">{{ $orden->estadoOrden }}</span></p>
            <p><strong>Cliente:</strong> {{ $orden->cliente->nombre }}</p>
            <p><strong>Fecha de Creación:</strong> {{ $orden->fechaCreacion->format('Y-m-d H:i:s') }}</p>
            <p><strong>Dirección de Entrega:</strong> {{ $orden->direccionEntrega }}</p>
            <p><strong>Nota Adicional:</strong> {{ $orden->notaAdicional }}</p>
        </div>
    </div>
    <a href="{{ route('ordenes.index') }}" class="btn btn-secondary mt-3">Volver a la lista de órdenes</a>
</div>
@endsection
