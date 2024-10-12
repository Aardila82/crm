@extends('layouts.app')

@section('title', 'Lista de Campos')

@section('content')
<div class="container mt-4">
    <h2>Lista de Campos</h2>
    <a href="{{ route('campos.create') }}" class="btn btn-primary mb-3">Agregar Campo</a>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            {{ $message }}
        </div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Tipo</th>
                <th>Estado</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($campos as $campo)
                <tr>
                    <td>{{ $campo->id_campo }}</td>
                    <td>{{ $campo->nombre_campo }}</td>
                    <td>{{ $campo->tipo_campo }}</td>
                    <td>{{ ucfirst($campo->estado) }}</td>
                    <td>
                        <a href="{{ route('campos.show', $campo->id_campo) }}" class="btn btn-info btn-sm">Ver</a>
                        <a href="{{ route('campos.edit', $campo->id_campo) }}" class="btn btn-warning btn-sm">Editar</a>
                        <form action="{{ route('campos.destroy', $campo->id_campo) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
