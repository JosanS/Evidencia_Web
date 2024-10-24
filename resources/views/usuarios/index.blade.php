<!-- resources/views/usuarios/index.blade.php -->

@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Usuarios</h1>
    <a href="{{ route('usuarios.create') }}">Crear Usuario</a>
    <table>
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Estado</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($usuarios as $user)
            <tr>
                <td>{{ $user->nombre }}</td>
                <td>{{ $user->active ? 'Active' : 'Inactive' }}</td>
                <td>
                    <a href="{{ route('usuarios.edit', $user->usuarioID) }}">Editar</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
