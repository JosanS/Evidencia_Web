<!-- resources/views/home.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Inicio</h1>
        <form action="{{ route('search.invoice') }}" method="GET">
            <input type="text" name="invoice" placeholder="Numero de Factura" required>
            <button type="submit">Buscar</button>
        </form>

        @if(isset($orden))
            <h2>Estado de Orden: {{ $orden->estadoOrden }}</h2>
            @if($orden->estadoOrden == 'Entregado')
                <img src="{{ asset('images/' . $orden->evidence_photo) }}" alt="Foto de Entrega">
                <p>Fecha: {{ $orden->fechaCreacion }}</p>
            @elseif(in_array($orden->estadoOrden, ['Ordenado', 'En Ruta', 'En Proceso']))
                <!-- <p>En Proceso: {{ $orden->process_name }}</p> -->
                <p>Fecha: {{ $orden->fechaCreacion }}</p>
            @endif
        @endif
    </div>
@endsection
