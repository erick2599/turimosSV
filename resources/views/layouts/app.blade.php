<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Turismo El Salvador</title>
    <!-- CDN Oficial de Bootstrap 5 CSS -->
    <link href="https://jsdelivr.net" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body class="bg-light d-flex flex-column min-vh-100">

    <!-- Barra de Navegación -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark shadow-sm">
        <div class="container">
            <a class="navbar-brand fw-bold text-uppercase" href="{{ route('lugares.index') }}">
                🇸🇻 El Salvador Explora
            </a>
        </div>
    </nav>

    <!-- Contenido Inyectado de las Vistas -->
    <main class="container my-5 flex-grow-1">
        @yield('content')
    </main>

    <!-- Pie de Página -->
    <footer class="bg-dark text-white text-center py-3 mt-auto">
        <p class="mb-0">&copy; {{ date('Y') }} Catálogo Turístico. Todos los derechos reservados.</p>
    </footer>

    <!-- CDN Oficial de Bootstrap 5 JS -->
    <script src="https://jsdelivr.net" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>