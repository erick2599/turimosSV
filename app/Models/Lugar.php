<?php

namespace App\Models;

class Lugar
{
    public static function all(): array
    {
        // Usamos base_path para apuntar directamente a la carpeta database
        $path = base_path('database/lugares.json');

        if (! file_exists($path)) {
            return []; // Retorna vacío si el archivo no está ahí
        }

        $json = file_get_contents($path);
        if ($json === false) {
            return [];
        }

        $data = json_decode($json, true);

        return is_array($data) ? $data : [];
    }

    public static function find(String $id)
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
