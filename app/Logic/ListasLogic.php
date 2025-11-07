<?php

namespace App\Logic;

use App\Models\ListasModel;
use App\Models\UsuariosModel;

class ListasLogic
{

    public static function ObtenerListaId(int $id)
    {
        try {
            $lista = ListasModel::ObtenerListaId($id);
            if (empty($lista)) {
                throw new \Exception('Lista no encontrada');
            }
            //Calculos

            return $lista;
        } catch (\Exception $e) {
            throw new \Exception('Error al obtener la lista por ID en la lógica: ' . $e->getMessage());
        }
    }
}
