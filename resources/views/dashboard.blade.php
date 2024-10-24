<!-- resources/views/dashboard.blade.php -->

@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Dashboard</h1>
    <ul>
        <li><a href="{{ route('usuarios.index') }}">Gestion de Usuarios</a></li>
        <li><a href="{{ route('ordenes.index') }}">Gestion de Ordenes</a></li>
        <li><a href="{{ route('ordenes.archived') }}">Ordenes Archivadas</a></li>
    </ul>
</div>
@endsection
