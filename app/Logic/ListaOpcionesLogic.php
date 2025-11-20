<?php

namespace App\Logic;

use App\Models\ListaOpciones;

class ListaOpcionesLogic
{
    //listar listas de opciones
    public static function ListarListaOpciones()
    {
        try {
            $listas = ListaOpciones::ListarListaOpciones();
            //Lógica adicional si es necesario
            return $listas;
        } catch (\Exception $e) {
            throw new \Exception('Error al listar las listas de opciones en la lógica: ' . $e->getMessage());
        }
    }

    public static function ObtenerListaOpcionesId(int $id)
    {
        try {
            $lista = ListaOpciones::ObtenerListaopcionesId($id);
            if (empty($lista)) {
                throw new \Exception('Lista no encontrada');
            }
            //Calculos

            return $lista;
        } catch (\Exception $e) {
            throw new \Exception('Error al obtener la lista por ID en la lógica: ' . $e->getMessage());
        }
    }

    //crear una nueva lista de opciones
    public static function CrearListaOpciones(?int $id, string $nombre, string $descripcion, int $estado, int $idLista)
    {
        try {
            $nuevaLista = ListaOpciones::CrearListaOpciones($id, $nombre, $descripcion, $estado, $idLista);
            return $nuevaLista;
        } catch (\Exception $e) {
            throw new \Exception('Error al crear la lista de opciones en la lógica: ' . $e->getMessage());
        }
    }

    //Actualizar lista de opciones
    public static function ActualizarListaOpciones(int $id, string $nombre, string $descripcion, int $estado, int $idLista)
    {
        try {
            $listaActualizada = ListaOpciones::ActualizarListaOpciones($id, $nombre, $descripcion, $estado, $idLista);
            return $listaActualizada;
        } catch (\Exception $e) {
            throw new \Exception('Error al actualizar la lista de opciones en la lógica: ' . $e->getMessage());
        }
    }

    //Eliminar lista de opciones
    public static function EliminarListaOpciones(int $id)
    {
        try {
            $resultado = ListaOpciones::EliminarListaOpciones($id);
            return $resultado;
        } catch (\Exception $e) {
            throw new \Exception('Error al eliminar la lista de opciones en la lógica: ' . $e->getMessage());
        }
    }
}
