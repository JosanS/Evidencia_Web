<!-- resources/views/ordenes/create.blade.php -->

@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Crear Orden</h1>
    <form action="{{ route('ordenes.store') }}" method="POST">
        @csrf
        <input type="text" name="numeroFactura" placeholder="Numero de Factura" required>
        <input type="text" name="estadoOrden" placeholder="Estado de Orden" required>
        <input type="datetime-local" name="fechaCreacion" required>
        <input type="text" name="direccionEntrega" placeholder="Direccion de Entrega" required>
        <textarea name="notaAdicional" placeholder="Notas Adicionales"></textarea>
        <button type="submit">Crear Orden</button>
    </form>
</div>
@endsection
