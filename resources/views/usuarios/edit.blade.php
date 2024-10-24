@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Editar Usuario: {{ $usuario->nombre }}</h1>
    <form action="{{ route('usuarios.update', $usuario->usuarioID) }}" method="POST">
        @csrf
        @method('PATCH')
        <input type="text" name="name" value="{{ $usuario->name }}" placeholder="Nombre" required>
        
        <select name="role">
            <option value="admin" {{ $usuario->role == 'admin' ? 'selected' : '' }}>Admin</option>
            <option value="Ventas" {{ $usuario->role == 'Ventas' ? 'selected' : '' }}>Ventas</option>
            <option value="Comprador" {{ $usuario->role == 'Comprador' ? 'selected' : '' }}>Comprador</option>
            <option value="Almacen" {{ $usuario->role == 'Almacen' ? 'selected' : '' }}>Almacen</option>
            <option value="Repartidor" {{ $usuario->role == 'Repartidor' ? 'selected' : '' }}>Repartidor</option>
        </select>

        <button type="submit">Actualizar</button>
    </form>
</div>
@endsection
