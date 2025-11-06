<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;

class CitaModel
{

    //Obtener cita por ID
    public static function ObtenerCitaPorId(int $id)
    {
        try {
            $resultado = DB::select('SELECT * FROM citas WHERE id = ?', [$id]);
            return $resultado;
        } catch (\Exception $e) {
            throw new \Exception('Error al obtener la cita por ID: ' . $e->getMessage());
        }
    }

    //Crear una nueva cita
    public static function CrearCita($fecha, $hora, $idUsuarioCreacion)
    {
        try {
            $id = DB::table('citas')->insertGetId([
                'fecha' => $fecha,
                'hora' => $hora,
                'idUsuarioCreacion' => $idUsuarioCreacion,
                'fechaCreacion' => now(),
                'fechaModificacion' => now()
            ]);

            return $id;
        } catch (\Exception $e) {
            throw new \Exception('Error al crear la cita: ' . $e->getMessage());
        }
    }
}
