<?php

namespace App\Logic;

use App\Models\CitasModel;

class CitasLogic
{
    //Listar cita
    public static function ListarCita()
    {
        try {
            $resultado = CitasModel::listarcita();
            return $resultado;
        } catch (\Exception $e) {
            throw new \Exception('Error al listar las citas en la lógica: ' . $e->getMessage());
        }
    }

    //Obtener cita por ID
    public static function ObtenerCitaId(int $id)
    {
        try {
            $resultado = CitasModel::ObtenerCitaId($id);
            if (empty($resultado)) {
                throw new \Exception('Cita no encontrada');
            }
            //Calculos

            return $resultado;
        } catch (\Exception $e) {
            throw new \Exception('Error al obtener la cita por ID en la lógica: ' . $e->getMessage());
        }
    }

    //Crear una nueva cita
    public static function CrearCita(
        ?int $id,
        string $fecha,
        string $hora,
        string $descripcion,
        int $estado,
        ?int $idHorario,
        int $idPaciente,
        int $idDoctor,
        int $idUsuarioCreacion
    ) {
        try {
            $nuevaCita = CitasModel::CrearCita(
                $id,
                $fecha,
                $hora,
                $descripcion,
                $estado,
                $idHorario,
                $idPaciente,
                $idDoctor,
                $idUsuarioCreacion
            );
            return $nuevaCita;
        } catch (\Exception $e) {
            throw new \Exception('Error al crear la cita en la lógica: ' . $e->getMessage());
        }
    }

    //Actualizar cita
    public static function ActualizarCita(
        int $id,
        string $fecha,
        string $hora,
        string $descripcion,
        int $estado,
        ?int $idHorario,
        int $idPaciente,
        int $idDoctor,
        int $idUsuarioCreacion
    ) {
        try {
            $citaActualizada = CitasModel::ActualizarCita(
                $id,
                $fecha,
                $hora,
                $descripcion,
                $estado,
                $idHorario,
                $idPaciente,
                $idDoctor,
                $idUsuarioCreacion
            );
            return $citaActualizada;
        } catch (\Exception $e) {
            throw new \Exception('Error al actualizar la cita en la lógica: ' . $e->getMessage());
        }
    }

    //Eliminar cita
    public static function EliminarCita(int $id)
    {
        try {
            $resultado = CitasModel::EliminarCita($id);
            return $resultado;
        } catch (\Exception $e) {
            throw new \Exception('Error al eliminar la cita en la lógica: ' . $e->getMessage());
        }
    }
}
