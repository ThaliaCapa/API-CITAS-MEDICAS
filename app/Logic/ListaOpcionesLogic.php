<?php

namespace App\Logic;

use App\Models\ListaOpciones;

class ListaOpcionesLogic
{
    public static function ObtenerListaId(int $id)
    {
        try {
            $lista = ListaOpciones::ObtenerListaId($id);
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
