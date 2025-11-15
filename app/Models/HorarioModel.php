<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;

class HorarioModel
{
    // Obtener todos los horarios
    public static function ListarHorarios()
    {
        try {
            // Ejecuta la función de la base de datos directamente
            $resultado = DB::select('SELECT * FROM listarhorarios()');
            return $resultado;
        } catch (\Exception $e) {
            throw new \Exception('Error al obtener los horarios: ' . $e->getMessage());
        }
    }

    //Obtener horario por ID
    public static function ObtenerHorarioId(int $id)
    {
        try {
            $resultado = DB::select(('SELECT * FROM obtnerhorarioporid WHERE id = ?'), [$id]);
            return $resultado;
        } catch (\Exception $e) {
            throw new \Exception('Error al obtener el horario por ID: ' . $e->getMessage());
        }
    }

    //Crear un nuevo horario
    public static function CrearHorario(?int $id, string $diaSemana, string $fecha, string $hora, int $idDoctor, int $idUsuarioCreacion, int $idUsuarioModificacion)
    {
        try {
            $resultado = DB::select('SELECT * FROM crearhorario(?,?,?,?,?,?,?)', [$id, $diaSemana, $fecha, $hora, $idDoctor, $idUsuarioCreacion, $idUsuarioModificacion]);
            return $resultado;
        } catch (\Exception $e) {
            throw new \Exception('Error al crear el horario: ' . $e->getMessage());
        }
    }

    //Actualizar horario
    public static function ActualizarHorario(int $id, string $diaSemana, string $fecha, string $hora, int $idDoctor, int $idUsuarioModificacion)
    {
        try {
            $resultado = DB::select('SELECT * FROM crearhorario(?,?,?,?,?,?)', [$id, $diaSemana, $fecha, $hora, $idDoctor, $idUsuarioModificacion]);
            return $resultado;
        } catch (\Exception $e) {
            throw new \Exception('Error al actualizar el horario: ' . $e->getMessage());
        }
    }

    //Eliminar horario
    public static function EliminarHorario(int $id)
    {
        try {
            $resultado = DB::select('SELECT * FROM eliminarhorario(?)', [$id]);
            return $resultado;
        } catch (\Exception $e) {
            throw new \Exception('Error al eliminar el horario: ' . $e->getMessage());
        }
    }
}
