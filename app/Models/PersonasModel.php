<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;

class PersonasModel
{
    //Obtener todas las personas

    public static function ListarPersonas()
    {
        try {
            $resultado = DB::select('SELECT * FROM listarpersonas()');
            return $resultado;
        } catch (\Exception $e) {
            throw new \Exception('Error al obtener las personas: ' . $e->getMessage());
        }
    }

    //Obtener persona por ID
    public static function ObtenerPersonaId(int $id)
    {
        try {
            $resultado = DB::select('SELECT * FROM personas WHERE id = ?', [$id]);
            return $resultado;
        } catch (\Exception $e) {
            throw new \Exception('Error al obtener la persona por ID: ' . $e->getMessage());
        }
    }

    //crear nueva persona
    public static function CrearPersona(
        ?int $id,
        int $numero_documento,
        string $apellido_paterno,
        string $apellido_materno,
        string $nombres,
        string $fecha_nacimiento,
        int $telefono,
        string $genero,
        string $sede,
        int $idEspecialidad,
        int $idTipoDocumento,
        int $idRol,
        int $idUsuario,
        int $idUsuarioCreacion,
    ) {
        try {
            $resultado = DB::select('SELECT * FROM crearpersona(?,?,?,?,?,?,?,?,?,?,?,?,?,?)', [
                $id,
                $numero_documento,
                $apellido_paterno,
                $apellido_materno,
                $nombres,
                $fecha_nacimiento,
                $telefono,
                $genero,
                $sede,
                $idEspecialidad,
                $idTipoDocumento,
                $idRol,
                $idUsuario,
                $idUsuarioCreacion
            ]);
            return $resultado;
        } catch (\Exception $e) {
            throw new \Exception('Error al crear la persona: ' . $e->getMessage());
        }
    }

    //Actualizar persona
    public static function ActualizarPersona(
        int $id,
        int $numero_documento,
        string $apellido_paterno,
        string $apellido_materno,
        string $nombres,
        string $fecha_nacimiento,
        int $telefono,
        string $genero,
        string $sede,
        int $idEspecialidad,
        int $idTipoDocumento,
        int $idRol,
    ) {
        try {
            $resultado = DB::select('SELECT * FROM actualizarpersona(?,?,?,?,?,?,?,?,?,?,?,?)', [
                $id,
                $numero_documento,
                $apellido_paterno,
                $apellido_materno,
                $nombres,
                $fecha_nacimiento,
                $telefono,
                $genero,
                $sede,
                $idEspecialidad,
                $idTipoDocumento,
                $idRol,
            ]);
            return $resultado;
        } catch (\Exception $e) {
            throw new \Exception('Error al actualizar la persona: ' . $e->getMessage());
        }
    }

    //Eliminar persona
    public static function EliminarPersona(int $id)
    {
        try {
            $resultado = DB::select('SELECT * FROM eliminarpersona(?)', [$id]);
            return $resultado; //retorna el mensaje de la base de datos
        } catch (\Exception $e) {
            throw new \Exception('Error al eliminar la persona: ' . $e->getMessage());
        }
    }
}
