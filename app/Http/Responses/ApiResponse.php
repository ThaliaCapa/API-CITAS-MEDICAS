<?php

namespace App\Http\Responses;

class ApiResponse
{
    public static function success($data = null, string $message = 'Operación exitosa', int $status = 200)
    {
        return response()->json([
            'status' => 'success',
            'message' => $message,
            'data' => $data
        ], $status);
    }

    public static function error(string $message = 'Error en la operación', int $status = 500, $data = null)
    {
        return response()->json([
            'status' => 'error',
            'message' => $message,
            'data' => $data
        ], $status);
    }
}
