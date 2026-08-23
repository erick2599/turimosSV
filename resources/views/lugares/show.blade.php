<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $lugar['titulo'] }} - Detalles</title>
    <!-- Cargamos Bootstrap de forma directa saltándonos a Vite -->
    <link rel="stylesheet" href="https://unpkg.com">
</head>

<body class="bg-light d-flex flex-column min-vh-100">

    <!-- Barra de Navegación -->
    <nav class="navbar navbar-dark bg-dark mb-4 shadow-sm">
        <div class="container">
            <a class="navbar-brand fw-bold text-decoration-none" href="{{ route('lugares.index') }}">
                🇸🇻 El Salvador Explora
            </a>
        </div>
    </nav>

    <!-- Contenido Principal -->
    <main class="container my-4 flex-grow-1">
        <div class="mb-4">
            <a href="{{ route('lugares.index') }}" class="btn btn-outline-secondary btn-sm fw-bold">
                &larr; Volver al catálogo
            </a>
        </div>

        <div class="row g-4">
            <!-- Columna Información del Lugar -->
            <div class="col-lg-7">
                <div class="bg-white p-4 rounded shadow-sm border-0">
                    <span class="badge bg-primary mb-3 px-3 py-2 fs-6">{{ $lugar['categoria'] }}</span>
                    <h1 class="fw-bold mb-3 text-dark">{{ $lugar['titulo'] }}</h1>

                    <table class="table table-borderless my-4">
                        <tbody>
                            <tr>
                                <th scope="row" class="text-muted w-25">Ubicación:</th>
                                <td class="fw-semibold text-dark">{{ $lugar['departamento'] }}</td>
                            </tr>
                            <tr>
                                <th scope="row" class="text-muted">Costo:</th>
                                <td><span class="text-success fw-bold">{{ $lugar['precio'] }}</span></td>
                            </tr>
                        </tbody>
                    </table>

                    <h5 class="fw-bold text-secondary border-bottom pb-2">Descripción</h5>
                    <p class="text-dark fs-5" style="line-height: 1.7;">
                        {{ $lugar['descripcion'] }}
                    </p>
                </div>
            </div>

            <!-- Columna Formulario de Contacto -->
            <div class="col-lg-5">
                <div class="card shadow-sm border-0">
                    <div class="card-header bg-dark text-white p-3">
                        <h5 class="mb-0 fw-bold">Solicitar más información</h5>
                    </div>
                    <div class="card-body p-4">

                        @if(session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session('success') }}
                        </div>
                        @endif

                        <form action="{{ route('lugares.contacto') }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label for="nombre" class="form-label fw-semibold">Nombre completo</label>
                                <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Ej. Juan Pérez" required>
                            </div>

                            <div class="mb-3">
                                <label for="email" class="form-label fw-semibold">Correo electrónico</label>
                                <input type="email" class="form-control" id="email" name="email" placeholder="nombre@correo.com" required>
                            </div>

                            <div class="mb-3">
                                <label for="mensaje" class="form-label fw-semibold">Mensaje o Consulta</label>
                                <textarea class="form-control" id="mensaje" name="mensaje" rows="4" placeholder="¿Qué dudas tienes sobre este destino?" required></textarea>
                            </div>

                            <button type="submit" class="btn btn-primary w-100 py-2 fw-bold">
                                Enviar Formulario
                            </button>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </main>

    <!-- Pie de Página -->
    <footer class="bg-dark text-white text-center py-3 mt-auto">
        <p class="mb-0">&copy; {{ date('Y') }} Prueba de Laravel</p>
    </footer>

</body>

</html>