<?php

namespace App\Logic;

use App\Models\HorarioModel;

class HorarioLogic
{
    //listar horarios
    public static function ListarHorarios()
    {
        try {
            $horarios = HorarioModel::ListarHorarios();
            //Lógica adicional si es necesario
            return $horarios;
        } catch (\Exception $e) {
            throw new \Exception('Error al listar los horarios en la lógica: ' . $e->getMessage());
        }
    }

    //Obtener horario por ID
    public static function ObtenerHorarioId(int $id)
    {
        try {
            $horario = HorarioModel::ObtenerHorarioId($id);
            if (empty($horario)) {
                throw new \Exception('Horario no encontrado');
            }
            //Calculos
            return $horario;
        } catch (\Exception $e) {
            throw new \Exception('Error al obtener el horario por ID en la lógica: ' . $e->getMessage());
        }
    }

    //Crear un nuevo horario
    public static function CrearHorario(?int $id, string $diaSemana, string $fecha, string $hora, int $idDoctor, int $idUsuarioCreacion, int $idUsuarioModificacion)
    {
        try {
            $nuevoHorario = HorarioModel::CrearHorario($id, $diaSemana, $fecha, $hora, $idDoctor, $idUsuarioCreacion, $idUsuarioModificacion);
            //Validaciones adicionales o lógica de negocio
            return $nuevoHorario;
        } catch (\Exception $e) {
            throw new \Exception('Error al crear el horario en la lógica: ' . $e->getMessage());
        }
    }

    //Actualizar horario
    public static function ActualizarHorario(int $id, string $diaSemana, string $fecha, string $hora, int $idDoctor, int $idUsuarioModificacion)
    {
        try {
            $horarioActualizado = HorarioModel::ActualizarHorario($id, $diaSemana, $fecha, $hora, $idDoctor, $idUsuarioModificacion);
            //Validaciones adicionales o lógica de negocio
            return $horarioActualizado;
        } catch (\Exception $e) {
            throw new \Exception('Error al actualizar el horario en la lógica: ' . $e->getMessage());
        }
    }

    //Eliminar horario
    public static function EliminarHorario(int $id)
    {
        try {
            $resultado = HorarioModel::EliminarHorario($id);
            return $resultado;
        } catch (\Exception $e) {
            throw new \Exception('Error al eliminar el horario en la lógica: ' . $e->getMessage());
        }
    }
}
