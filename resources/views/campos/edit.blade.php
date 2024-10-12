@extends('layouts.app')

@section('title', 'Editar Campo')

@section('content')
<div class="container mt-4">
    <h2>Editar Campo</h2>

    <form action="{{ route('campos.update', $campo->id_campo) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="nombre_campo" class="form-label">Nombre del Campo</label>
            <input type="text" name="nombre_campo" id="nombre_campo" class="form-control" value="{{ $campo->nombre_campo }}" required>
        </div>

        <div class="mb-3">
            <label for="tipo_campo" class="form-label">Tipo de Campo</label>
            <input type="text" name="tipo_campo" id="tipo_campo" class="form-control" value="{{ $campo->tipo_campo }}" required>
        </div>

        <div class="mb-3">
            <label for="estado" class="form-label">Estado</label>
            <select name="estado" id="estado" class="form-select" required>
                <option value="activo" {{ $campo->estado == 'activo' ? 'selected' : '' }}>Activo</option>
                <option value="inactivo" {{ $campo->estado == 'inactivo' ? 'selected' : '' }}>Inactivo</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Actualizar</button>
    </form>
</div>
@endsection
