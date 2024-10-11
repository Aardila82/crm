@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h2>Detalles del Contacto</h2>

    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Nombre: {{ $contact->name }} {{ $contact->last_name }}</h5>
            <p class="card-text"><strong>Correo Electrónico:</strong> {{ $contact->email }}</p>
            <p class="card-text"><strong>Teléfono:</strong> {{ $contact->phone }}</p>
            <p class="card-text"><strong>Dirección:</strong> {{ $contact->address ?? 'N/A' }}</p>
            <p class="card-text"><strong>Estado:</strong> {{ ucfirst($contact->status) }}</p>
            <p class="card-text"><strong>Mensaje:</strong> {{ $contact->message ?? 'No se ha enviado ningún mensaje.' }}</p>
        </div>
    </div>

    <a href="{{ route('contacts.index') }}" class="btn btn-secondary mt-3">Volver a la lista de contactos</a>
</div>
@endsection
