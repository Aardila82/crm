@extends('layouts.app')

@section('title', 'Crear Campo')

@section('content')
<div class="container mt-4">
    <h2>Crear Campo</h2>

    <form action="{{ route('campos.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="nombre_campo" class="form-label">Nombre del Campo</label>
            <input type="text" name="nombre_campo" id="nombre_campo" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="tipo_campo" class="form-label">Tipo de Campo</label>
            <input type="text" name="tipo_campo" id="tipo_campo" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="estado" class="form-label">Estado</label>
            <select name="estado" id="estado" class="form-select" required>
                <option value="activo">Activo</option>
                <option value="inactivo">Inactivo</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Guardar</button>
    </form>
</div>
@endsection
