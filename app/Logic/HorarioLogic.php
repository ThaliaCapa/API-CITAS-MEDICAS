<?php

namespace App\Logic;

use App\Models\HorarioModel;

class HorarioLogic
{
    public static function ObtenerHorarioId(int $id)
    {
        try {
            $horario = HorarioModel::ObtenerHorarioId($id);
            if (empty($horario)) {
                throw new \Exception('Horario no encontrado');
            }
            //Calculos
            return $horario;
        } catch (\Exception $e) {
            throw new \Exception('Error al obtener el horario por ID en la lógica: ' . $e->getMessage());
        }
    }
}
