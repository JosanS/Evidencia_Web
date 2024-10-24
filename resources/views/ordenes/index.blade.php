<!-- resources/views/ordenes/index.blade.php -->

@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Ordenes</h1>
    <a href="{{ route('ordenes.create') }}">Crear Orden</a>
    <table>
        <thead>
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
                <td>{{ $orden->estadoOrden }}</td>
                <td>
                    <a href="{{ route('ordenes.edit', $orden->ordenID) }}">Editar</a>
                    <a href="{{ route('ordenes.show', $orden->ordenID) }}">Ver</a>
                    <form action="{{ route('ordenes.destroy', $orden->ordenID) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('¿Estás seguro de que deseas eliminar esta orden?');">Eliminar</button>
                        </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
