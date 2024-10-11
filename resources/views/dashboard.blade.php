<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Estilos del menú lateral */
        .sidebar {
            height: 100vh;
            width: 48px;
            background-color: #343a40; /* Color oscuro de Bootstrap */
            transition: width 0.3s;
            position: fixed;
            top: 0;
            left: 0;
        }

        .sidebar:hover {
            width: 250px; /* Se expande cuando se pasa el mouse */
        }

        .sidebar .nav-link {
            color: white;
            font-size: 18px;
            padding: 15px;
            text-align: left;
            white-space: nowrap;
            transition: all 0.2s ease-in-out;
        }

        .sidebar .nav-link:hover {
            background-color: #495057; /* Color más claro al pasar el mouse */
        }

        .sidebar .nav-link i {
            margin-right: 10px;
        }

        .content {
            margin-left: 60px; /* Espacio cuando el menú está contraído */
            padding: 20px;
            transition: margin-left 0.3s;
        }

        .sidebar:hover ~ .content {
            margin-left: 250px; /* Ajusta el contenido cuando el menú se expande */
        }
    </style>
</head>
<body>

<!-- Menú lateral -->
<div class="sidebar d-flex flex-column">
    <a href="#" class="nav-link"><i class="bi bi-house"></i> Inicio</a>
    <a href="#" class="nav-link"><i class="bi bi-briefcase"></i> Servicios</a>
    <a href="#" class="nav-link"><i class="bi bi-person"></i> Nosotros</a>
    <a href="#" class="nav-link"><i class="bi bi-envelope"></i> Contacto</a>
</div>

<!-- Contenido principal -->
<div class="content">
    <div class="container mt-4">
        <h1>Bienvenido al Dashboard</h1>
        <p>Has iniciado sesión exitosamente.</p>

        <!-- Botón para cerrar sesión -->
        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit" class="btn btn-danger">Cerrar Sesión</button>
        </form>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.5.0/font/bootstrap-icons.css" rel="stylesheet">
</body>
</html>
