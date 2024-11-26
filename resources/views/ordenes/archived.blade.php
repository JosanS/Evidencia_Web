@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">Órdenes Archivadas</h1>
    <table class="table table-bordered table-hover">
        <thead class="table-light">
            <tr>
                <th>Orden ID</th>
                <th>Cliente</th>
                <th>Número de Factura</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @forelse($archivedordenes as $orden)
            <tr>
                <td>{{ $orden->ordenID }}</td>
                <td>{{ $orden->cliente->nombre }}</td>
                <td>{{ $orden->numeroFactura }}</td>
                <td>
                    <a href="{{ route('ordenes.restore', $orden->ordenID) }}" class="btn btn-sm btn-success">Restaurar</a>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="4" class="text-center">No hay órdenes archivadas.</td>
            </tr>
            @endforelse
        </tbody>
    </table>
    <a href="{{ route('ordenes.index') }}" class="btn btn-secondary mt-3">Volver a la lista de órdenes</a>
</div>
@endsection
