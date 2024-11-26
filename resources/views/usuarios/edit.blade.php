<!-- resources/views/usuarios/edit.blade.php -->

@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">Editar Usuario: {{ $usuario->nombre }}</h1>
    <form action="{{ route('usuarios.update', $usuario->usuarioID) }}" method="POST" class="needs-validation" novalidate>
        @csrf
        @method('PATCH')
        <div class="mb-3">
            <label for="name" class="form-label">Nombre</label>
            <input type="text" id="name" name="name" value="{{ $usuario->name }}" class="form-control" placeholder="Nombre" required>
        </div>
        <div class="mb-3">
            <label for="role" class="form-label">Rol</label>
            <select id="role" name="role" class="form-select" required>
                <option value="admin" {{ $usuario->role == 'admin' ? 'selected' : '' }}>Admin</option>
                <option value="Ventas" {{ $usuario->role == 'Ventas' ? 'selected' : '' }}>Ventas</option>
                <option value="Comprador" {{ $usuario->role == 'Comprador' ? 'selected' : '' }}>Comprador</option>
                <option value="Almacen" {{ $usuario->role == 'Almacen' ? 'selected' : '' }}>Almacen</option>
                <option value="Repartidor" {{ $usuario->role == 'Repartidor' ? 'selected' : '' }}>Repartidor</option>
            </select>
        </div>
        <button type="submit" class="btn btn-success">Actualizar</button>
        <a href="{{ route('usuarios.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection
