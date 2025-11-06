<?php

namespace App\Http\Controllers;

use App\Http\Responses\ApiResponse;
use App\Logic\UsuariosLogic;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class UsuariosController extends Controller
{
    public function ListarUsuarios()
    {
        try {
            $resultado = UsuariosLogic::ListarUsuarios();

            return ApiResponse::success($resultado, 'Usuarios obtenidos correctamente', 200);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Error al listar los usuarios en el controlador: ' . $e->getMessage()], 500);
        }
    }
    public function ObtnerUsuarioId(Request $request)
    {
        try {
            $request->validate([
                'id' => 'required|integer'
            ]);
            $id = $request->input('id');

            $resultado = UsuariosLogic::ObtnerUsuarioId($id);

            return ApiResponse::success($resultado, 'Usuario obtenido correctamente', 200);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Error al obtener el usuario por ID en el controlador: ' . $e->getMessage()], 500);
        }
    }

    public function CrearUsuario(Request $request)
    {
        try {
            $request->validate([
                //'id' => 'integer',
                'correo' => 'required|email',
                'contrasena' => 'required|string',
                'estado' => 'required|integer'
            ]);

            $id = $request->input('id');
            $correo = $request->input('correo');
            $contrasena = $request->input('contrasena');
            $estado = $request->input('estado');

            //var_dump($id, $correo, $contrasena, $estado);

            $nuevoUsuario = UsuariosLogic::CrearUsuario($id, $correo, $contrasena, $estado);

            return ApiResponse::success($nuevoUsuario, 'Usuario creado correctamente', 201);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Error al crear el usuario en el controlador: ' . $e->getMessage()], 500);
        }
    }

    //Actualizar usuario
    public function ActualizarUsuario(Request $request)
    {
        try {
            $request->validate([
                'id' => 'required|integer',
                'correo' => 'required|email',
                'contrasena' => 'required|string',
                'estado' => 'required|integer'
            ]);

            $id = $request->input('id');
            $correo = $request->input('correo');
            $contrasena = $request->input('contrasena');
            $estado = $request->input('estado');

            $usuarioActualizado = UsuariosLogic::ActualizarUsuario($id, $correo, $contrasena, $estado);

            return ApiResponse::success($usuarioActualizado, 'Usuario actualizado correctamente', 200);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Error al actualizar el usuario en el controlador: ' . $e->getMessage()], 500);
        }
    }

    //Eliminar usuario
    public function EliminarUsuario(Request $request)
    {
        try {
            $request->validate([
                'id' => 'required|integer'
            ]);
            $id = $request->input('id');

            $resultado = UsuariosLogic::EliminarUsuario($id);

            return ApiResponse::success($resultado, 'Usuario eliminado correctamente', 200);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Error al eliminar el usuario en el controlador: ' . $e->getMessage()], 500);
        }
    }
}
