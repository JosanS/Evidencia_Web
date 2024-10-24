@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Editar Orden</h1>
        
        <form action="{{ route('ordenes.update', $orden->ordenID) }}" method="POST">
            @csrf
            @method('PATCH')

            <div class="form-group">
                <label for="clienteID">Cliente:</label>
                <select name="clienteID" id="clienteID" required>
                    @foreach($clientes as $cliente)
                        <option value="{{ $cliente->clienteID }}" {{ $orden->clienteID == $cliente->clienteID ? 'selected' : '' }}>
                            {{ $cliente->nombre }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="numeroFactura">Número de Factura:</label>
                <input type="text" name="numeroFactura" id="numeroFactura" value="{{ $orden->numeroFactura }}" required>
            </div>

            <div class="form-group">
                <label for="estadoOrden">Estado de la Orden:</label>
                <select name="estadoOrden" id="estadoOrden" required>
                    <option value="Ordenado" {{ $orden->estadoOrden == 'Ordenado' ? 'selected' : '' }}>Ordenado</option>    
                    <option value="En Proceso" {{ $orden->estadoOrden == 'En Proceso' ? 'selected' : '' }}>En Proceso</option>
                    <option value="En Ruta" {{ $orden->estadoOrden == 'En Ruta' ? 'selected' : '' }}>En Ruta</option>
                    <option value="Entregado" {{ $orden->estadoOrden == 'Entregado' ? 'selected' : '' }}>Entregado</option>
                    <option value="Cancelado" {{ $orden->estadoOrden == 'Cancelado' ? 'selected' : '' }}>Cancelado</option>
                </select>
            </div>

            <div class="form-group">
                @if(in_array($orden->estadoOrden, ['En Ruta', 'Entregado']))
                    <div>
                        <label for="evidence_photo">Subir foto de evidencia:</label>
                        <input type="file" name="evidence_photo" accept="image/*">
                    </div>
                @endif
            </div>

            <button type="submit">Actualizar Orden</button>
        </form>
    </div>
@endsection
