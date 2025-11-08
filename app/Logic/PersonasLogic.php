<?php

namespace App\Logic;

use App\Models\PersonasModel;

class PersonasLogic
{
    public static function ObtenerPersonaId(int $id)
    {
        try {
            $persona = PersonasModel::ObtenerPersonaId($id);
            if (empty($persona)) {
                throw new \Exception('Persona no encontrada');
            }

            return $persona;
        } catch (\Exception $e) {
            throw new \Exception('Error al obtener la persona por ID en la lógica: ' . $e->getMessage());
        }
    }

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
            $nuevaPersona = PersonasModel::CrearPersona(
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
            );

            return $nuevaPersona;
        } catch (\Exception $e) {
            throw new \Exception('Error al crear la persona en la lógica: ' . $e->getMessage());
        }
    }

}
