<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;

class CitasModel
{
    //Listar cita
    public static function listarcita()
    {
        try {
            $resultado = DB::select('SELECT * FROM listarcita()');
            return $resultado;
        } catch (\Exception $e) {
            throw new \Exception('Error al obtener la cita por ID: ' . $e->getMessage());
        }
    }
    //Obtener cita por ID
    public static function ObtenerCitaId(int $id)
    {
        try {
            $resultado = DB::select('SELECT * FROM obtenercitaporid(?)', [$id]);
            return $resultado;
        } catch (\Exception $e) {
            throw new \Exception('Error al obtener la cita por ID: ' . $e->getMessage());
        }
    }

    //Crear una nueva cita
    public static function CrearCita(
        int $id,
        string $fecha,
        string $hora,
        string $descripcion,
        int $estado,
        int $idHorario,
        int $idPaciente,
        int $idDoctor,
        int $idUsuarioCreacion
    ) {
        try {
            $resultado = DB::select(
                'SELECT * FROM crearcita(?,?,?,?,?,?,?,?,?)',
                [$id, $fecha, $hora, $descripcion, $estado, $idHorario, $idPaciente, $idDoctor, $idUsuarioCreacion]
            );

            return $resultado;
        } catch (\Exception $e) {
            throw new \Exception('Error al crear la cita: ' . $e->getMessage());
        }
    }


    //Actualizar cita
    public static function ActualizarCita(
        int $id,
        string $fecha,
        string $hora,
        string $descripcion,
        int $estado,
        ?int $idHorario,
        int $idPaciente,
        int $idDoctor,
        int $idUsuarioCreacion
    ) {
        try {
            $resultado = DB::select(
                'SELECT * FROM crearcita(?,?,?,?,?,?,?,?,?)',
                [$id, $fecha, $hora, $descripcion, $estado, $idHorario, $idPaciente, $idDoctor, $idUsuarioCreacion]
            );
            return $resultado;
        } catch (\Exception $e) {
            throw new \Exception('Error al actualizar la cita: ' . $e->getMessage());
        }
    }

    //eliminar cita
    public static function EliminarCita(int $id)
    {
        try {
            $resultado = DB::select('SELECT * FROM eliminarcita(?)', [$id]);
            return $resultado;
        } catch (\Exception $e) {
            throw new \Exception('Error al eliminar la cita: ' . $e->getMessage());
        }
    }
}
