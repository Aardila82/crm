@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h2>Agregar Contacto</h2>

    <form action="{{ route('contacts.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Nombre</label>
            <input type="text" name="name" id="name" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="last_name" class="form-label">Apellido</label>
            <input type="text" name="last_name" id="last_name" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">Correo Electrónico</label>
            <input type="email" name="email" id="email" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="phone" class="form-label">Teléfono</label>
            <input type="text" name="phone" id="phone" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="address" class="form-label">Dirección</label>
            <input type="text" name="address" id="address" class="form-control">
        </div>

        <div class="mb-3">
            <label for="status" class="form-label">Estado</label>
            <select name="status" id="status" class="form-select">
                <option value="vendido">Vendido</option>
                <option value="no interesado">No interesado</option>
                <option value="contactado">Contactado</option>
                <option value="no contactado">No contactado</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Guardar Contacto</button>
    </form>
</div>
@endsection
