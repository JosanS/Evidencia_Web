<!-- resources/views/usuarios/create.blade.php -->

@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Crear usuario</h1>
    <form action="{{ route('usuarios.store') }}" method="POST">
        @csrf
        <input type="text" name="name" placeholder="Name" required>
        <select name="role">
            <option value="admin">Admin</option>
            <option value="usuario">Ventas</option>
            <option value="usuario">Comprador</option>
            <option value="usuario">Almacen</option>
            <option value="usuario">Repartidor</option>
        </select>

        <button type="submit">Crear</button>
    </form>
</div>
@endsection
