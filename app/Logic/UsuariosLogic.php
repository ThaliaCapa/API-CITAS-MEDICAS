<?php

namespace App\Logic;

use App\Models\UsuariosModel;

class UsuariosLogic
{
    public static function ListarUsuarios()
    {
        try {
            $usuarios = UsuariosModel::ListarUsuarios();
            //Lógica adicional si es necesario
            return $usuarios;
        } catch (\Exception $e) {
            throw new \Exception('Error al listar los usuarios en la lógica: ' . $e->getMessage());
        }
    }
    public static function ObtnerUsuarioId(int $id)
    {
        try {
            $usuario = UsuariosModel::ObtnerUsuarioId($id);
            if (empty($usuario)) {
                throw new \Exception('Usuario no encontrado');
            }
            //Calculos

            return $usuario;
        } catch (\Exception $e) {
            throw new \Exception('Error al obtener el usuario por ID en la lógica: ' . $e->getMessage());
        }
    }

    public static function CrearUsuario(?int $id, string $correo, string $contrasena, int $estado)
    {
        try {
            $nuevoUsuario = UsuariosModel::CrearUsuario($id, $correo, $contrasena, $estado);
            //Validaciones adicionales o lógica de negocio
            //var_dump($nuevoUsuario);
            return $nuevoUsuario;
        } catch (\Exception $e) {
            throw new \Exception('Error al crear el usuario en la lógica: ' . $e->getMessage());
        }
    }
}
