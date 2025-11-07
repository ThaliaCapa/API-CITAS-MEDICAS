<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;

class HorarioModel
{
    public static function ObtenerHorarioId(int $id)
    {
        try {
            $resultado = DB::select(('SELECT * FROM ObtenerHorarioPorId WHERE id = ?'), [$id]);
            return $resultado;
        } catch (\Exception $e) {
            throw new \Exception('Error al obtener el horario por ID: ' . $e->getMessage());
        }
    }
}
