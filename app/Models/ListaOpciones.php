<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;

class ListaOpciones
{
    //Obtener horario por ID
    public static function ObtenerListaId(int $id)
    {
        try {
            $resultado = DB::select('SELECT * FROM obtenerlistaporid(?)', [$id]);
            return $resultado;
        } catch (\Exception $e) {
            throw new \Exception('Error al obtener la lista por ID: ' . $e->getMessage());
        }
    }
}
