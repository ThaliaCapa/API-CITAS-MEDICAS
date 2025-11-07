<?php

namespace App\Logic;

use App\Models\CitasModel;

class CitasLogic
{

    public static function ObtenerCitaId(int $id)
    {
        try {
            $cita = CitasModel::ObtenerCitaId($id);
            if (empty($cita)) {
                throw new \Exception('Cita no encontrada');
            }
            //Calculos

            return $cita;
        } catch (\Exception $e) {
            throw new \Exception('Error al obtener la cita por ID en la lógica: ' . $e->getMessage());
        }
    }
}
