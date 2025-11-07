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
}
