<?php

namespace App\Models;

class Lugar
{
    /**
     * @return array<mixed>
     */
    public static function all(): array
    {
        // Usamos base_path para apuntar directamente a la carpeta database
        $path = base_path('database/lugares.json');

        if (! file_exists($path)) {
            return []; // Retorna vacío si el archivo no está ahí
        }

        // Forzamos a string para asegurar que json_decode nunca reciba false
        $json = (string) file_get_contents($path);

        return json_decode($json, true) ?? [];
    }

    /**
     * @return array<mixed>|null
     */
    public static function find(string $id): ?array
    {
        $lugares = self::all();
        foreach ($lugares as $lugar) {
            if ($lugar['id'] == $id) {
                return $lugar;
            }
        }

        return null;
    }
}
