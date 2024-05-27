<?php
    include('../clases/BD.php');
    include('../clases/Citas.php');

    setlocale(LC_ALL,"es_ES");
    date_default_timezone_set("America/Mexico_City");
    $obj_Cita = new Cita();

    if($_POST['dml'] == 'insert') {
        $paciente_id = $_POST['paciente_id'];
        $fecha = $_POST['fecha'];
        $hora = $_POST['hora'];
        $duracion = $_POST['duracion'];
        $motivo = $_POST['motivo'];
        $obj_Cita->agregarCita($paciente_id, $fecha, $hora, $duracion, $motivo);
        echo 1;
    } elseif ($_POST['dml'] == 'update') {
        $cita_id = $_POST['id'];
        $paciente_id = $_POST['paciente_id'];
        $fecha = $_POST['fecha'];
        $hora = $_POST['hora'];
        $duracion = $_POST['duracion'];
        $motivo = $_POST['motivo'];
        $obj_Cita->modificarCita($cita_id, $paciente_id, $fecha, $hora, $duracion, $motivo);
        echo 1;
    } elseif($_POST['dml'] == 'delete') {
        $cita_id = $_POST['id'];
        $obj_Cita->eliminarCita($cita_id);
        echo 1;
    }
?>

