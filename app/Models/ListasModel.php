<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;

class ListasModel
{
    //listar listas
    public static function ListarListas()
    {
        try {
            $resultado = DB::select('SELECT * FROM listarlista()');
            return $resultado;
        } catch (\Exception $e) {
            throw new \Exception('Error al obtener las listas: ' . $e->getMessage());
        }
    }

    //Obtener lista por ID
    public static function ObtenerListaId(int $id)
    {
        try {
            $resultado = DB::select('SELECT * FROM obtenerlistaporid(?)', [$id]);
            return $resultado;
        } catch (\Exception $e) {
            throw new \Exception('Error al obtener la lista por ID ' . $e->getMessage());
        }
    }


    //crear nueva lista
    public static function CrearLista(?int $id, string $nombre, string $descripcion, int $estado)
    {
        try {
            $resultado = DB::select('SELECT * FROM crearlista(?,?,?,?)', [$id, $nombre, $descripcion, $estado]);
            return $resultado;
        } catch (\Exception $e) {
            throw new \Exception('Error al crear la lista: ' . $e->getMessage());
        }
    }

    //Actualizar lista
    public static function ActualizarLista(int $id, string $nombre, string $descripcion, int $estado)
    {
        try {
            $resultado = DB::select('SELECT * FROM crearlista(?,?,?,?)', [$id, $nombre, $descripcion, $estado]); //La funcion tiene funcionalidad de editar si es que recibe el id

            return $resultado; // retorna 1 si se actualizó correctamente
        } catch (\Exception $e) {
            throw new \Exception('Error al actualizar la lista: ' . $e->getMessage());
        }
    }

    //Eliminar lista
    public static function EliminarLista(int $id)
    {
        try {
            $resultado = DB::select('SELECT * FROM eliminarlista(?)', [$id]);
            return $resultado; // retorna 1 si se eliminó correctamente
        } catch (\Exception $e) {
            throw new \Exception('Error al eliminar la lista: ' . $e->getMessage());
        }
    }
}
