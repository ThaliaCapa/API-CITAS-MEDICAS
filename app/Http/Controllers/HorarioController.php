<?php

namespace App\Http\Controllers;

use App\Http\Responses\ApiResponse;

use App\Logic\HorarioLogic;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class HorarioController extends Controller
{
    //listar horarios
    public function ListarHorarios()
    {
        try {
            $resultado = HorarioLogic::ListarHorarios();
            return ApiResponse::success($resultado, 'Horarios obtenidos correctamente', 200);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Error al listar los horarios en el controlador: ' . $e->getMessage()], 500);
        }
    }

    //Obtener horario por ID
    public function ObtenerHorarioId(Request $request)
    {
        try {
            $request->validate([
                'id' => 'required|integer'
            ]);
            $id = $request->input('id');

            $resultado = HorarioLogic::ObtenerHorarioId($id);

            return ApiResponse::success($resultado, 'Horario obtenido correctamente', 200);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Error al obtener el horario por ID en el controlador: ' . $e->getMessage()], 500);
        }
    }

    //Crear un nuevo horario
    public function CrearHorario(Request $request)
    {
        try {
            $request->validate([
                'id' => 'nullable|integer',
                'diaSemana' => 'required|string',
                'fecha' => 'required|date',
                'hora' => 'required|string',
                'idDoctor' => 'required|integer',
                'idUsuarioCreacion' => 'required|integer',
                'idUsuarioModificacion' => 'required|integer',
            ]);

            $id = $request->input('id');
            $diaSemana = $request->input('diaSemana');
            $fecha = $request->input('fecha');
            $hora = $request->input('hora');
            $idDoctor = $request->input('idDoctor');
            $idUsuarioCreacion = $request->input('idUsuarioCreacion');
            $idUsuarioModificacion = $request->input('idUsuarioModificacion');

            $resultado = HorarioLogic::CrearHorario($id, $diaSemana, $fecha, $hora, $idDoctor, $idUsuarioCreacion, $idUsuarioModificacion);

            return ApiResponse::success($resultado, 'Horario creado correctamente', 201);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Error al crear el horario en el controlador: ' . $e->getMessage()], 500);
        }
    }

    //Actualizar horario
    public function ActualizarHorario(Request $request)
    {
        try {
            $request->validate([
                'id' => 'required|integer',
                'diaSemana' => 'required|string',
                'fecha' => 'required|date',
                'hora' => 'required|string',
                'idDoctor' => 'required|integer',
                'idUsuarioModificacion' => 'required|integer',
            ]);

            $id = $request->input('id');
            $diaSemana = $request->input('diaSemana');
            $fecha = $request->input('fecha');
            $hora = $request->input('hora');
            $idDoctor = $request->input('idDoctor');
            $idUsuarioModificacion = $request->input('idUsuarioModificacion');

            $resultado = HorarioLogic::ActualizarHorario($id, $diaSemana, $fecha, $hora, $idDoctor, $idUsuarioModificacion);

            return ApiResponse::success($resultado, 'Horario actualizado correctamente', 200);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Error al actualizar el horario en el controlador: ' . $e->getMessage()], 500);
        }
    }

    //Eliminar horario
    public function EliminarHorario(Request $request)
    {
        try {
            $request->validate([
                'id' => 'required|integer'
            ]);
            $id = $request->input('id');

            $resultado = HorarioLogic::EliminarHorario($id);

            return ApiResponse::success($resultado, 'Horario eliminado correctamente', 200);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Error al eliminar el horario en el controlador: ' . $e->getMessage()], 500);
        }
    }
}
