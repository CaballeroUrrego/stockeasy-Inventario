<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - StockEasy</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<!-- CSS personalizado -->
        <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar">
        <button class="navbar-toggler" id="menu-toggle">&#9776;</button>
        <a class="text-white navbar-brand" href="{{ route('admin.dashboard') }}">StockEasy - Admin</a>
    </nav>

    <!-- Sidebar -->
    <div class="sidebar" id="sidebar">
        <h4>Menú</h4>
        <a href="{{ route('admin.dashboard') }}" class="nav-link">Dashboard</a>
        <a href="{{ route('admin.usuarios.index') }}" class="nav-link">Usuarios</a>
        <a href="{{ route('admin.productos.index') }}" class="nav-link">Productos</a>
        <a href="{{ route('admin.proveedores.index') }}" class="nav-link">Proveedores</a>
        <a href="{{ route('admin.ventas') }}" class="nav-link">Ventas</a>
        <a href="{{ route('logout') }}" class="nav-link"
           onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Cerrar Sesión</a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
        </form>
    </div>

    <!-- Contenido Principal -->
    <div class="content">
        <div class="logo-container">
            <div class="mb-4 text-center">
                <img src="{{ asset('storage/LogoStockEase.svg') }}" alt="Logo StockEase" style="max-width: 150px; height: auto;">
            </div>
        </div>
        @yield('content')
    </div>

    <script>
        document.getElementById("menu-toggle").addEventListener("click", function() {
            document.getElementById("sidebar").classList.toggle("show");
        });
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

