<!-- @extends('layouts.app') -->

@section('content')
<div class="container">
    <h1 class="mb-4">Inicio</h1>
    
    <form action="{{ route('search.invoice') }}" method="GET" class="mb-4">
        <div class="input-group">
            <input type="text" name="invoice" class="form-control" placeholder="Número de Factura" required>
            <button type="submit" class="btn btn-primary">Buscar</button>
        </div>
    </form>

    @if(isset($orden))
        <div class="card">
            <div class="card-body">
                <h2 class="card-title">Estado de Orden: <span class="badge bg-info">{{ $orden->estadoOrden }}</span></h2>

                @if($orden->estadoOrden == 'Entregado')
                    <img src="{{ asset('images/' . $orden->evidence_photo) }}" alt="Foto de Entrega" class="img-fluid rounded mt-3">
                    <p class="mt-3"><strong>Fecha de Entrega:</strong> {{ $orden->fechaCreacion }}</p>
                @elseif(in_array($orden->estadoOrden, ['Ordenado', 'En Ruta', 'En Proceso']))
                    <p class="mt-3"><strong>Fecha de Creación:</strong> {{ $orden->fechaCreacion }}</p>
                @endif
            </div>
        </div>
    @endif
</div>
@endsection

