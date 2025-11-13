<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;

class UsuariosModel
{
    //Obtener todos los usuarios
    public static function ListarUsuarios()
    {
        try {
            $resultado = DB::select('SELECT * FROM listarusuarios()');
            return $resultado;
        } catch (\Exception $e) {
            throw new \Exception('Error al obtener los usuarios: ' . $e->getMessage());
        }
    }

    //Obtener usuario por ID
    public static function ObtnerUsuarioId(int $id)
    {
        try {
            $resultado = DB::select('SELECT * FROM obtnerusarioporid(?)', [$id]);
            return $resultado;
        } catch (\Exception $e) {
            throw new \Exception('Error al obtener el usuario por ID: ' . $e->getMessage());
        }
    }

    //Crear un nuevo usuario
    public static function CrearUsuario(?int $id, string $correo, string $contrasena, int $estado,)
    {
        try {
            $resultado = DB::select('SELECT * FROM crearusuario(?,?,?,?)', [$id, $correo, $contrasena, $estado]);
            return $resultado;
        } catch (\Exception $e) {
            throw new \Exception('Error al crear el usuario: ' . $e->getMessage());
        }
    }

    //Actualizar usuario
    public static function ActualizarUsuario(int $id, string $correo, string $contrasena, int $estado)
    {
        try {
            $resultado = DB::select('SELECT * FROM crearusuario(?,?,?,?)', [$id, $correo, $contrasena, $estado]); //La funcion tiene funcionalidad de editar si es que recibe el id

            return $resultado; // retorna 1 si se actualizó correctamente
        } catch (\Exception $e) {
            throw new \Exception('Error al actualizar el usuario: ' . $e->getMessage());
        }
    }

    //Eliminar usuario
    public static function EliminarUsuario(int $id)
    {
        try {
            $resultado = DB::select('SELECT * FROM eliminarusuario(?)', [$id]);
            return $resultado;
        } catch (\Exception $e) {
            throw new \Exception('Error al eliminar el usuario: ' . $e->getMessage());
        }
    }
}
