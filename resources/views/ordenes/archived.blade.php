@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Ordenes Archivadas</h1>
    <table>
        <thead>
            <tr>
                <th>Orden ID</th>
                <th>Cliente</th>
                <th>Numero de Factura</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($archivedordenes as $orden)
            <tr>
                <td>{{ $orden->ordenID }}</td>
                <td>{{ $orden->cliente->nombre }}</td>
                <td>{{ $orden->numeroFactura }}</td>
                <td>
                    <a href="{{ route('ordenes.restore', $orden->ordenID) }}">Restaurar</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
