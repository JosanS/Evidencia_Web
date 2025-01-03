@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">Órdenes</h1>
    <a href="{{ route('ordenes.create') }}" class="btn btn-primary mb-3">Crear Orden</a>
    <table class="table table-bordered table-hover">
        <thead class="table-light">
            <tr>
                <th>ID</th>
                <th>Cliente</th>
                <th>Número de Factura</th>
                <th>Estado</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($ordenes as $orden)
            <tr>
                <td>{{ $orden->ordenID }}</td>
                <td>{{ $orden->cliente->nombre }}</td>
                <td>{{ $orden->numeroFactura }}</td>
                <td>
                    <span class="badge {{ $orden->estadoOrden === 'Entregado' ? 'bg-success' : 'bg-warning' }}">
                        {{ $orden->estadoOrden }}
                    </span>
                </td>
                <td>
                    <a href="{{ route('ordenes.edit', $orden->ordenID) }}" class="btn btn-sm btn-warning">Editar</a>
                    <a href="{{ route('ordenes.show', $orden->ordenID) }}" class="btn btn-sm btn-info">Ver</a>
                    <form action="{{ route('ordenes.destroy', $orden->ordenID) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('¿Estás seguro de que deseas eliminar esta orden?');">Eliminar</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
