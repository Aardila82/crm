<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar Sesión</title>
    <!-- Incluimos Bootstrap desde CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="d-flex justify-content-center align-items-center vh-100">
    <div class="col-md-4">
        <div class="card shadow-sm">
            <div class="card-body">
                <h2 class="text-center mb-4">Iniciar Sesión</h2>

                <!-- Formulario de Login -->
                <form action="{{ route('login') }}" method="POST" class="mt-4">
                    @csrf
                    <div class="mb-3">
                        <label for="email" class="form-label">Correo Electrónico</label>
                        <input type="email" name="email" id="email" class="form-control" placeholder="ejemplo@correo.com" required>
                    </div>

                    <div class="mb-3">
                        <label for="password" class="form-label">Contraseña</label>
                        <input type="password" name="password" id="password" class="form-control" placeholder="********" required>
                    </div>

                    <div class="d-grid">
                        <button type="submit" class="btn btn-primary btn-block">Iniciar Sesión</button>
                    </div>
                </form>

                <!-- Mostrar errores -->
                @if ($errors->any())
                    <div class="alert alert-danger mt-3">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>

<!-- Incluimos Bootstrap JS desde CDN -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
