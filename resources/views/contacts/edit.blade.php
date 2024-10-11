@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h2>Editar Contacto</h2>

    <form action="{{ route('contacts.update', $contact->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="name" class="form-label">Nombre</label>
            <input type="text" name="name" id="name" class="form-control" value="{{ old('name', $contact->name) }}" required>
        </div>

        <div class="mb-3">
            <label for="last_name" class="form-label">Apellido</label>
            <input type="text" name="last_name" id="last_name" class="form-control" value="{{ old('last_name', $contact->last_name) }}" required>
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">Correo Electrónico</label>
            <input type="email" name="email" id="email" class="form-control" value="{{ old('email', $contact->email) }}" required>
        </div>

        <div class="mb-3">
            <label for="phone" class="form-label">Teléfono</label>
            <input type="text" name="phone" id="phone" class="form-control" value="{{ old('phone', $contact->phone) }}" required>
        </div>

        <div class="mb-3">
            <label for="address" class="form-label">Dirección</label>
            <input type="text" name="address" id="address" class="form-control" value="{{ old('address', $contact->address) }}">
        </div>

        <div class="mb-3">
            <label for="status" class="form-label">Estado</label>
            <select name="status" id="status" class="form-select" required>
                <option value="vendido" {{ $contact->status == 'vendido' ? 'selected' : '' }}>Vendido</option>
                <option value="no interesado" {{ $contact->status == 'no interesado' ? 'selected' : '' }}>No interesado</option>
                <option value="contactado" {{ $contact->status == 'contactado' ? 'selected' : '' }}>Contactado</option>
                <option value="no contactado" {{ $contact->status == 'no contactado' ? 'selected' : '' }}>No contactado</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Guardar Cambios</button>
    </form>
</div>
@endsection
