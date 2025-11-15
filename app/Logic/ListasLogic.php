<?php

namespace App\Logic;

use App\Models\ListasModel;
use App\Models\UsuariosModel;

class ListasLogic
{
    //listar listas
    public static function ListarListas()
    {
        try {
            $listas = ListasModel::ListarListas();
            //Lógica adicional si es necesario
            return $listas;
        } catch (\Exception $e) {
            throw new \Exception('Error al listar las listas en la lógica: ' . $e->getMessage());
        }
    }


    //Obtener lista por ID
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

    //crear nueva lista
    public static function CrearLista(?int $id, string $nombre, string $descripcion, int $estado)
    {
        try {
            $nuevaLista = ListasModel::CrearLista($id, $nombre, $descripcion, $estado);
            //Validaciones adicionales o lógica de negocio
            //var_dump($nuevaLista);
            return $nuevaLista;
        } catch (\Exception $e) {
            throw new \Exception('Error al crear la lista en la lógica: ' . $e->getMessage());
        }
    }

    //Actualizar lista
    public static function ActualizarLista(int $id, string $nombre, string $descripcion, int $estado)
    {
        try {
            $listaActualizada = ListasModel::ActualizarLista($id, $nombre, $descripcion, $estado);
            //Validaciones adicionales o lógica de negocio

            return $listaActualizada;
        } catch (\Exception $e) {
            throw new \Exception('Error al actualizar la lista en la lógica: ' . $e->getMessage());
        }
    }

    //Eliminar lista
    public static function EliminarLista(int $id)
    {
        try {
            $resultado = ListasModel::EliminarLista($id);
            //Validaciones adicionales o lógica de negocio

            return $resultado;
        } catch (\Exception $e) {
            throw new \Exception('Error al eliminar la lista en la lógica: ' . $e->getMessage());
        }
    }
}
