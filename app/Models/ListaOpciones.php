<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;

class ListaOpciones
{
    //Obtener horario por ID
    public static function ObtenerListaId(int $id)
    {
        try {
            $resultado = DB::select('SELECT * FROM obtenerlistaporid(?)', [$id]);
            return $resultado;
        } catch (\Exception $e) {
            throw new \Exception('Error al obtener la lista por ID: ' . $e->getMessage());
        }
    }

    //crear lista de opciones
    public static function CrearLista(int $id, string $nombre, int $estado, int $idLista)
    {
        try {
            $resultado = DB::select('SELECT * FROM crearlistaopciones(?,?,?,?)', [$id, $nombre, $estado, $idLista]);
            return $resultado;
        } catch (\Exception $e) {
            throw new \Exception('Error al crear la lista de opciones: ' . $e->getMessage());
        }
    }
}
