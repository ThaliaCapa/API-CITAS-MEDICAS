<?php

namespace App\Http\Controllers;

use App\Http\Responses\ApiResponse;
use App\Logic\PersonasLogic;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;


class PersonasController extends Controller
{

    public function ListarPersonas()
    {
        try {
            $resultado = PersonasLogic::ListarPersonas();

            return ApiResponse::success($resultado, 'Personas obtenidas correctamente', 200);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Error al obtener las personas en el controlador: ' . $e->getMessage()], 500);
        }
    }


    public function ObtenerPersonaId(Request $request)
    {
        try {
            $request->validate([
                'id' => 'required|integer'
            ]);
            $id = $request->input('id');

            $resultado = PersonasLogic::ObtenerPersonaId($id);

            return response()->json(['data' => $resultado, 'message' => 'Persona obtenida correctamente'], 200);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Error al obtener la persona por ID en el controlador: ' . $e->getMessage()], 500);
        }
    }

    public function CrearPersona(Request $request)
    {
        try {
            $request->validate([
                'id' => 'integer|nullable',
                'numero_documento' => 'required|integer',
                'apellido_paterno' => 'required|string',
                'apellido_materno' => 'required|string',
                'nombres' => 'required|string',
                'fecha_nacimiento' => 'required|date',
                'telefono' => 'required|integer',
                'genero' => 'required|string',
                'sede' => 'required|string',
                'idEspecialidad' => 'required|integer',
                'idTipoDocumento' => 'required|integer',
                'idRol' => 'required|integer',
                'idUsuario' => 'required|integer',
                'idUsuarioCreacion' => 'required|integer',
            ]);

            $resultado = PersonasLogic::CrearPersona(
                $request->input('id'),
                $request->input('numero_documento'),
                $request->input('apellido_paterno'),
                $request->input('apellido_materno'),
                $request->input('nombres'),
                $request->input('fecha_nacimiento'),
                $request->input('telefono'),
                $request->input('genero'),
                $request->input('sede'),
                $request->input('idEspecialidad'),
                $request->input('idTipoDocumento'),
                $request->input('idRol'),
                $request->input('idUsuario'),
                $request->input('idUsuarioCreacion')
            );

            return response()->json(['data' => $resultado, 'message' => 'Persona creada correctamente'], 201);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Error al crear la persona en el controlador: ' . $e->getMessage()], 500);
        }
    }

    //Actualizar persona
    public function ActualizarPersona(Request $request)
    {
        try {
            $request->validate([
                'id' => 'required|integer',
                'numero_documento' => 'required|integer',
                'apellido_paterno' => 'required|string',
                'apellido_materno' => 'required|string',
                'nombres' => 'required|string',
                'fecha_nacimiento' => 'required|date',
                'telefono' => 'required|integer',
                'genero' => 'required|string',
                'sede' => 'required|string',
                'idEspecialidad' => 'required|integer',
                'idTipoDocumento' => 'required|integer',
                'idRol' => 'required|integer',
            ]);

            $resultado = PersonasLogic::ActualizarPersona(
                $request->input('id'),
                $request->input('numero_documento'),
                $request->input('apellido_paterno'),
                $request->input('apellido_materno'),
                $request->input('nombres'),
                $request->input('fecha_nacimiento'),
                $request->input('telefono'),
                $request->input('genero'),
                $request->input('sede'),
                $request->input('idEspecialidad'),
                $request->input('idTipoDocumento'),
                $request->input('idRol')
            );

            return response()->json(['data' => $resultado, 'message' => 'Persona actualizada correctamente'], 200);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Error al actualizar la persona en el controlador: ' . $e->getMessage()], 500);
        }
    }


    //eliminar persona 
    public function EliminarPersona(Request $request)
    {
        try {
            $request->validate([
                'id' => 'required|integer'
            ]);
            $id = $request->input('id');

            $resultado = PersonasLogic::EliminarPersona($id);

            return ApiResponse::success($resultado, 'Persona eliminada correctamente', 200);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Error al eliminar la persona en el controlador: ' . $e->getMessage()], 500);
        }
    }
}
