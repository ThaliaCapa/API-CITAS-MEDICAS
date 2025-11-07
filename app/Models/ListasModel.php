<?php

namespace App\Models;
use Illuminate\Support\Facades\DB;

class ListasModel
{
    //Obtener Lista por ID
    public static function ObtenerListaId(int $id)
    {
        try {
            $resultado = DB::select('SELECT * FROM ObtenerListaporId(?)', [$id]);
            return $resultado;
        } catch (\Exception $e) {
            throw new \Exception('Error al obtener los elementos: ' . $e->getMessage());
        }
    }
}