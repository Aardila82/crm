@extends('layouts.app') <!-- Extiende el layout que creaste -->

@section('title', 'Página de Prueba')

@section('content')
    <div class="container">
        <h1>Página de Prueba</h1>
        <p>Esta es una prueba para verificar que el layout funciona correctamente.</p>

        <!-- Aquí se incluirá el formulario de contacto -->
        <h2>Formulario de Contacto</h2>
        @include('partials.form-contact') <!-- Incluir el formulario de contacto -->
    </div>
@endsection
