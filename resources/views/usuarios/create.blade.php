<!-- resources/views/usuarios/create.blade.php -->

@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">Crear Usuario</h1>
    <form action="{{ route('usuarios.store') }}" method="POST" class="needs-validation" novalidate>
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Nombre</label>
            <input type="text" id="name" name="name" class="form-control" placeholder="Ingrese el nombre" required>
        </div>
        <div class="mb-3">
            <label for="role" class="form-label">Rol</label>
            <select id="role" name="role" class="form-select" required>
                <option value="" disabled selected>Seleccione un rol</option>
                <option value="admin">Admin</option>
                <option value="Ventas">Ventas</option>
                <option value="Comprador">Comprador</option>
                <option value="Almacen">Almacen</option>
                <option value="Repartidor">Repartidor</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Crear</button>
        <a href="{{ route('usuarios.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection
