<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Mi Aplicación')</title>
    <!-- Agregamos Bootstrap desde CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.5.0/font/bootstrap-icons.css" rel="stylesheet">
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

        .footer {
            margin-left: 60px;
            transition: margin-left 0.3s;
        }

        .sidebar:hover ~ .footer {
            margin-left: 250px; /* Ajusta el footer cuando el menú se expande */
        }
    </style>
    @vite(['resources/css/styles.css']) <!-- Esto es opcional si usas Vite -->
</head>
<body>

<!-- Menú lateral -->
<div class="sidebar d-flex flex-column">
    <a href="{{ url('/') }}" class="nav-link {{ request()->is('/') ? 'active' : '' }}">
        <i class="bi bi-house"></i> Inicio
    </a>
    <a href="{{ url('/home') }}" class="nav-link {{ request()->is('home') ? 'active' : '' }}">
        <i class="bi bi-house-door"></i> Home
    </a>
    <a href="{{ url('/dashboard') }}" class="nav-link {{ request()->is('dashboard') ? 'active' : '' }}">
        <i class="bi bi-speedometer2"></i> Dashboard
    </a>

    <!-- Botón de cerrar sesión -->
    <form action="{{ route('logout') }}" method="POST" class="mt-auto">
        @csrf
        <button type="submit" class="nav-link bg-transparent border-0 text-white d-flex align-items-center">
            <i class="bi bi-x-circle-fill"></i>
            <span class="ms-2">Cerrar Sesión</span>
        </button>
    </form>
</div>

<!-- Contenido principal -->
<div class="content">
    <div class="container mt-4">
        @yield('content') <!-- Aquí se insertará el contenido de cada página -->
    </div>
</div>

<!-- Footer -->
<footer class="text-center mt-4 footer">
    <p>&copy; 2024 Mi Aplicación. Todos los derechos reservados.</p>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
@vite(['resources/js/app.js']) <!-- Esto es opcional si usas Vite -->
</body>
</html>
