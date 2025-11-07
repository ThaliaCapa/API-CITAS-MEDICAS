<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;

class CitasModel{

    public static function ObtenerCitaId(int $id)
    {
       try{
              $resultado = DB::select('SELECT * FROM obtnercitaporid(?)', [$id]);
              return $resultado;
       }catch(\Exception $e){
           throw new \Exception('Error al obtener la cita por ID: ' . $e->getMessage());
       }
    }
   
}