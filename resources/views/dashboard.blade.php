@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">Dashboard</h1>
    
    <div class="list-group">
        <a href="{{ route('usuarios.index') }}" class="list-group-item list-group-item-action">Gestión de Usuarios</a>
        <a href="{{ route('ordenes.index') }}" class="list-group-item list-group-item-action">Gestión de Órdenes</a>
        <a href="{{ route('ordenes.archived') }}" class="list-group-item list-group-item-action">Órdenes Archivadas</a>
    </div>
</div>
@endsection
