<?php

namespace App\Http\Controllers;

use App\Http\Responses\ApiResponse;

use App\Logic\HorarioLogic;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class HorarioController extends Controller
{
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
}
