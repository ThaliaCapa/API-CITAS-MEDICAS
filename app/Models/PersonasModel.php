<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;

class PersonasModel
{
    //Obtener persona por ID
    public static function ObtenerPersonaId(int $id)
    {
        try {
            $resultado = DB::select('SELECT * FROM personas WHERE id = ?', [$id]);
            return $resultado;
        } catch (\Exception $e) {
            throw new \Exception('Error al obtener la persona por ID: ' . $e->getMessage());
        }
    }




















    //Registrar nueva persona
    public static function CrearPersona($numero_documento, $apellido_paterno, $apellido_materno, $nombres, $fecha_nacimiento, $telefono, $genero, $sede, $idEspecialidad, $idTipoDocumento, $idRol, $idUsuario, $idUsuarioCreacion)
    {
        try {
            $id = DB::table('persona')->insertGetId([
                'numero_documento' => $numero_documento,
                'apellido_paterno' => $apellido_paterno,
                'apellido_materno' => $apellido_materno,
                'nombres' => $nombres,
                'fecha_nacimiento' => $fecha_nacimiento,
                'telefono' => $telefono,
                'genero' => $genero,
                'sede' => $sede,
                'idEspecialidad' => $idEspecialidad,
                'idTipoDocumento' => $idTipoDocumento,
                'idRol' => $idRol,
                'idUsuario' => $idUsuario,
                'idUsuarioCreacion' => $idUsuarioCreacion,
                'fechaCreacion' => now(),
                'fechaModificacion' => now()
            ]);
            return $id;
        } catch (\Exception $e) {
            throw new \Exception('Error al crear la persona: ' . $e->getMessage());
        }
    }

    //Actualizar persona
    public static function ActualizarPersona($id, $numero_documento, $apellido_paterno, $apellido_materno, $nombres, $fecha_nacimiento, $telefono, $genero, $sede, $idEspecialidad, $idTipoDocumento, $idRol, $idUsuarioModificacion)
    {
        try {
            $resultado = DB::table('persona')
                ->where('id', $id)
                ->update([
                    'numero_documento' => $numero_documento,
                    'apellido_paterno' => $apellido_paterno,
                    'apellido_materno' => $apellido_materno,
                    'nombres' => $nombres,
                    'fecha_nacimiento' => $fecha_nacimiento,
                    'telefono' => $telefono,
                    'genero' => $genero,
                    'sede' => $sede,
                    'idEspecialidad' => $idEspecialidad,
                    'idTipoDocumento' => $idTipoDocumento,
                    'idRol' => $idRol,
                    'idUsuarioModificacion' => $idUsuarioModificacion,
                    'fechaModificacion' => now()
                ]);
            return $resultado;
        } catch (\Exception $e) {
            throw new \Exception('Error al actualizar la persona: ' . $e->getMessage());
        }
    }

    //Eliminar persona
    public static function EliminarPersona($id)
    {
        try {
            $resultado = DB::table('persona')->where('id', $id)->delete();
            return $resultado;
        } catch (\Exception $e) {
            throw new \Exception('Error al eliminar la persona: ' . $e->getMessage());
        }
    }
}
