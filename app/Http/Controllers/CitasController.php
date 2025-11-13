<?php

namespace App\Http\Controllers;

use App\Http\Responses\ApiResponse;
use App\Logic\CitasLogic;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class CitasController extends Controller
{
    //Listar cita
    public function ListarCita()
    {
        try {
            $resultado = CitasLogic::ListarCita();
            return ApiResponse::success($resultado, 'Citas listadas correctamente', 200);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Error al listar las citas en el controlador: ' . $e->getMessage()], 500);
        }
    }


    //Obtener cita por ID
    public function ObtenerCitaId(Request $request)
    {
        try {
            $request->validate([
                'id' => 'required|integer'
            ]);
            $id = $request->input('id');

            $resultado = CitasLogic::ObtenerCitaId($id);

            return ApiResponse::success($resultado, 'Cita obtenida correctamente', 200);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Error al obtener la cita por ID en el controlador: ' . $e->getMessage()], 500);
        }
    }

    //Crear o actualizar una cita
    public function CrearCita(Request $request)
    {
        try {
            $request->validate([
                'id' => 'nullable|integer',
                'fecha' => 'required|date',
                'hora' => 'required|date_format:H:i:s',
                'descripcion' => 'required|string|max:255',
                'estado' => 'nullable|integer',
                'idHorario' => 'nullable|integer|exists:horario,id',
                'idPaciente' => 'required|integer|exists:persona,id',
                'idDoctor' => 'required|integer|exists:persona,id',
                'idUsuarioCreacion' => 'required|integer'
            ]);

            $nuevaCita = CitasLogic::CrearCita(
                $request->input('id'),
                $request->input('fecha'),
                $request->input('hora'),
                $request->input('descripcion'),
                $request->input('estado', 1),
                $request->input('idHorario'),
                $request->input('idPaciente'),
                $request->input('idDoctor'),
                $request->input('idUsuarioCreacion')
            );

            $mensaje = $request->input('id') ? 'Cita actualizada correctamente' : 'Cita creada correctamente';
            return ApiResponse::success($nuevaCita[0], $mensaje, $request->input('id') ? 200 : 201);
        } catch (\Illuminate\Validation\ValidationException $e) {
            return ApiResponse::error('Datos inválidos: ' . json_encode($e->errors()), 422);
        } catch (\Exception $e) {
            return ApiResponse::error('Error al crear la cita: ' . $e->getMessage(), 500);
        }
    }

    //Actualizar una cita
    public function ActualizarCita(Request $request)
    {
        try {
            $request->validate([
                'id' => 'required|integer',
                'fecha' => 'required|date',
                'hora' => 'required|date_format:H:i:s',
                'descripcion' => 'required|string|max:255',
                'estado' => 'nullable|integer',
                'idHorario' => 'nullable|integer|exists:horario,id',
                'idPaciente' => 'required|integer|exists:persona,id',
                'idDoctor' => 'required|integer|exists:persona,id',
                'idUsuarioCreacion' => 'required|integer'
            ]);

            $citaActualizada = CitasLogic::ActualizarCita(
                $request->input('id'),
                $request->input('fecha'),
                $request->input('hora'),
                $request->input('descripcion'),
                $request->input('estado', 1),
                $request->input('idHorario'),
                $request->input('idPaciente'),
                $request->input('idDoctor'),
                $request->input('idUsuarioCreacion')
            );

            return ApiResponse::success($citaActualizada[0], 'Cita actualizada correctamente', 200);
        } catch (\Illuminate\Validation\ValidationException $e) {
            return ApiResponse::error('Datos inválidos: ' . json_encode($e->errors()), 422);
        } catch (\Exception $e) {
            return ApiResponse::error('Error al actualizar la cita: ' . $e->getMessage(), 500);
        }
    }

    //Eliminar una cita
    public function EliminarCita(Request $request)
    {
        try {
            $request->validate([
                'id' => 'required|integer'
            ]);
            $id = $request->input('id');

            $resultado = CitasLogic::EliminarCita($id);

            return ApiResponse::success($resultado[0], 'Cita eliminada correctamente', 200);
        } catch (\Illuminate\Validation\ValidationException $e) {
            return ApiResponse::error('Datos inválidos: ' . json_encode($e->errors()), 422);
        } catch (\Exception $e) {
            return ApiResponse::error('Error al eliminar la cita: ' . $e->getMessage(), 500);
        }
    }
}
