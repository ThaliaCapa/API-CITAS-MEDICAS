<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;

class ListaOpciones
{
    //Obtener todas las listas de opciones
    public static function ListarListaOpciones()
    {
        try {
            $resultado = DB::select('SELECT * FROM listarlistaopciones()');
            return $resultado;
        } catch (\Exception $e) {
            throw new \Exception('Error al obtener las listas de opciones: ' . $e->getMessage());
        }
    }

    //Obtener lista de opciones por ID
    public static function ObtenerListaopcionesId(int $id)
    {
        try {
            $resultado = DB::select('SELECT * FROM obtnerlistaopcionesporid(?)', [$id]);
            return $resultado;
        } catch (\Exception $e) {
            throw new \Exception('Error al obtener la lista por ID: ' . $e->getMessage());
        }
    }

    //crear una nueva lista de opciones
    public static function CrearListaOpciones(?int $id, string $nombre, string $descripcion, int $estado, int $idLista)
    {
        try {
            $resultado = DB::select('SELECT * FROM crearlistaopciones(?,?,?,?,?)', [$id, $nombre, $descripcion, $estado, $idLista]);
            return $resultado;
        } catch (\Exception $e) {
            throw new \Exception('Error al crear la lista de opciones: ' . $e->getMessage());
        }
    }

    //Actualizar lista de opciones
    public static function ActualizarListaOpciones(int $id, string $nombre, string $descripcion, int $estado, int $idLista)
    {
        try {
            $resultado = DB::select('SELECT * FROM crearlistaopciones(?,?,?,?,?)', [$id, $nombre, $descripcion, $estado, $idLista]);
            return $resultado;
        } catch (\Exception $e) {
            throw new \Exception('Error al actualizar la lista de opciones: ' . $e->getMessage());
        }
    }

    //Eliminar lista de opciones
    public static function EliminarListaOpciones(int $id)
    {
        try {
            $resultado = DB::select('SELECT * FROM eliminarlistaopciones(?)', [$id]);
            return $resultado;
        } catch (\Exception $e) {
            throw new \Exception('Error al eliminar la lista de opciones: ' . $e->getMessage());
        }
    }
}
