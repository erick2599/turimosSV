<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Catálogo Turístico</title>
    <!-- Cargamos los estilos locales del proyecto mediante Vite -->
</head>

<body style="background-color: #f3f4f6; font-family: sans-serif; margin: 0; padding: 0;">

    <!-- Barra de navegación con estilos en línea estables -->
    <nav style="background-color: #1f2937; padding: 15px 0; box-shadow: 0 2px 4px rgba(0,0,0,0.1);">
        <div style="max-width: 1200px; margin: 0 auto; padding: 0 20px;">
            <span style="color: white; font-weight: bold; font-size: 1.2rem;">🇸🇻 El Salvador Explora</span>
        </div>
    </nav>

    <!-- Contenido principal -->
    <div style="max-width: 1200px; margin: 40px auto; padding: 0 20px;">

        <div style="text-align: center; margin-bottom: 40px;">
            <h1 style="color: #1e40af; font-size: 2.5rem; margin-bottom: 10px;">Catálogo Turístico</h1>
            <p style="color: #4b5563; font-size: 1.1rem;">Descubre los mejores lugares para visitar en El Salvador</p>
        </div>

        <!-- Contenedor adaptado estilo rejilla -->
        <div style="display: flex; flex-wrap: wrap; gap: 20px; justify-content: center;">
            @foreach($lugares as $lugar)
            <div style="background-color: white; border-radius: 8px; box-shadow: 0 4px 6px rgba(0,0,0,0.05); width: 300px; padding: 20px; display: flex; flex-direction: column; justify-content: space-between;">
                <div>
                    <span style="background-color: #e5e7eb; color: #374151; padding: 4px 8px; border-radius: 4px; font-size: 0.8rem; font-weight: bold;">
                        {{ $lugar['categoria'] }}
                    </span>
                    <h3 style="color: #111827; margin: 15px 0 10px 0; font-size: 1.3rem;">{{ $lugar['titulo'] }}</h3>
                    <p style="color: #6b7280; font-size: 0.9rem; margin-bottom: 10px;">
                        <strong>Depto:</strong> {{ $lugar['departamento'] }}
                    </p>
                    <p style="color: #374151; font-size: 0.95rem; line-height: 1.5;">{{ $lugar['descripcion'] }}</p>
                </div>

                <a href="{{ route('lugares.show', $lugar['id']) }}" style="display: block; text-align: center; background-color: #2563eb; color: white; padding: 10px; border-radius: 6px; text-decoration: none; font-weight: bold; margin-top: 15px;">
                    Ver Detalles
                </a>
            </div>
            @endforeach
        </div>

    </div>

</body>

</html>