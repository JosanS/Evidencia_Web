@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">Editar Orden</h1>
    <form action="{{ route('ordenes.update', $orden->ordenID) }}" method="POST" class="needs-validation" novalidate>
        @csrf
        @method('PATCH')

        <div class="mb-3">
            <label for="clienteID" class="form-label">Cliente:</label>
            <select name="clienteID" id="clienteID" class="form-select" required>
                @foreach($clientes as $cliente)
                <option value="{{ $cliente->clienteID }}" {{ $orden->clienteID == $cliente->clienteID ? 'selected' : '' }}>
                    {{ $cliente->nombre }}
                </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="numeroFactura" class="form-label">Número de Factura:</label>
            <input type="text" name="numeroFactura" id="numeroFactura" value="{{ $orden->numeroFactura }}" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="estadoOrden" class="form-label">Estado de la Orden:</label>
            <select name="estadoOrden" id="estadoOrden" class="form-select" required>
                <option value="Ordenado" {{ $orden->estadoOrden == 'Ordenado' ? 'selected' : '' }}>Ordenado</option>
                <option value="En Proceso" {{ $orden->estadoOrden == 'En Proceso' ? 'selected' : '' }}>En Proceso</option>
                <option value="En Ruta" {{ $orden->estadoOrden == 'En Ruta' ? 'selected' : '' }}>En Ruta</option>
                <option value="Entregado" {{ $orden->estadoOrden == 'Entregado' ? 'selected' : '' }}>Entregado</option>
                <option value="Cancelado" {{ $orden->estadoOrden == 'Cancelado' ? 'selected' : '' }}>Cancelado</option>
            </select>
        </div>

        @if(in_array($orden->estadoOrden, ['En Ruta', 'Entregado']))
        <div class="mb-3">
            <label for="evidence_photo" class="form-label">Subir foto de evidencia:</label>
            <input type="file" name="evidence_photo" id="evidence_photo" class="form-control" accept="image/*">
        </div>
        @endif

        <button type="submit" class="btn btn-success">Actualizar Orden</button>
        <a href="{{ route('ordenes.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection
