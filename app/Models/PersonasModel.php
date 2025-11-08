<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;

class PersonasModel
{
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
}
