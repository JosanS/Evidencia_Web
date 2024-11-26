@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">Crear Orden</h1>
    <form action="{{ route('ordenes.store') }}" method="POST" class="needs-validation" novalidate>
        @csrf

        <div class="mb-3">
            <label for="numeroFactura" class="form-label">Número de Factura:</label>
            <input type="text" name="numeroFactura" id="numeroFactura" class="form-control" placeholder="Ingrese el número de factura" required>
        </div>

        <div class="mb-3">
            <label for="estadoOrden" class="form-label">Estado de Orden:</label>
            <select name="estadoOrden" id="estadoOrden" class="form-select" required>
                <option value="" disabled selected>Seleccione un estado</option>
                <option value="Ordenado">Ordenado</option>
                <option value="En Proceso">En Proceso</option>
                <option value="En Ruta">En Ruta</option>
                <option value="Entregado">Entregado</option>
                <option value="Cancelado">Cancelado</option>
            </select>
        </div>

        <div class="mb-3">
            <label for="direccionEntrega" class="form-label">Dirección de Entrega:</label>
            <input type="text" name="direccionEntrega" id="direccionEntrega" class="form-control" placeholder="Ingrese la dirección de entrega" required>
        </div>

        <div class="mb-3">
            <label for="notaAdicional" class="form-label">Nota Adicional:</label>
            <textarea name="notaAdicional" id="notaAdicional" class="form-control" rows="3" placeholder="Ingrese una nota adicional"></textarea>
        </div>

        <button type="submit" class="btn btn-primary">Crear Orden</button>
        <a href="{{ route('ordenes.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection
