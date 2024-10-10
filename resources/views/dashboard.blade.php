@extends('layouts.app') <!-- Extiende de un layout si ya tienes uno -->

@section('title', 'Dashboard')

@section('content')
<div class="container mt-4">
    <h1>Bienvenido al Dashboard</h1>
    <p>Has iniciado sesión exitosamente.</p>

    <!-- Botón para cerrar sesión -->
    <form action="{{ route('logout') }}" method="POST">
        @csrf
        <button type="submit" class="btn btn-danger">Cerrar Sesión</button>
    </form>
</div>
@endsection
