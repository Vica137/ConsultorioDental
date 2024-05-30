<?php

class Cita
{
    function agregarCita($paciente_id, $fecha, $hora, $duracion, $motivo)
    {
        $SQL_Ins_Cita =
            "INSERT INTO cita(paciente_id, fecha, hora, duracion, motivo)
         VALUES ($paciente_id, '$fecha', '$hora', '$duracion', '$motivo')";

        $bd = new BD();
        $bd->abrirBD();
        $transaccion_1 = new Transaccion($bd->conexion);
        $transaccion_1->enviarQuery($SQL_Ins_Cita);
        $bd->cerrarBD();
    }

    function eliminarCita($cita_id)
    {
        $SQL_Eli_Cita =
            " DELETE FROM cita
        WHERE cita_id = $cita_id;
      ";

        $bd = new BD();
        $bd->abrirBD();
        $transaccion_1 = new Transaccion($bd->conexion);
        $transaccion_1->enviarQuery($SQL_Eli_Cita);
        $bd->cerrarBD();
    }

    function buscarTodos()
    {
        $SQL_Bus_Citas =
            "SELECT cita_id, paciente_id, fecha, hora, duracion, motivo
       FROM cita;";

        $bd = new BD();
        $bd->abrirBD();
        $transaccion_1 = new Transaccion($bd->conexion);
        $transaccion_1->enviarQuery($SQL_Bus_Citas);
        $bd->cerrarBD();
        return ($transaccion_1->traerRegistros());
    }

    function modificarCita($cita_id, $paciente_id, $fecha, $hora, $duracion, $motivo)
    {
        $SQL_Act_Cita =
            "UPDATE cita
          SET paciente_id = $paciente_id, 
          fecha = '$fecha', 
          hora = '$hora', 
          duracion = '$duracion', 
          motivo = '$motivo'
          WHERE cita_id = $cita_id";

        $bd = new BD();
        $bd->abrirBD();
        $transaccion_1 = new Transaccion($bd->conexion);
        $transaccion_1->enviarQuery($SQL_Act_Cita);
        $bd->cerrarBD();
    }

    function buscarCita($cita_id)
    {
        $SQL_Bus_Cita =
            "SELECT cita_id, paciente_id, fecha, hora, duracion, motivo
       FROM cita
       WHERE cita_id = $cita_id";

        $bd = new BD();
        $bd->abrirBD();
        $transaccion_1 = new Transaccion($bd->conexion);
        $transaccion_1->enviarQuery($SQL_Bus_Cita);
        $obj_Cita = $transaccion_1->traerObjeto(0);
        $bd->cerrarBD();
        return $obj_Cita;
    }
}
?>
