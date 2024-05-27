<?php
include('../../clases/BD.php');
include('../../clases/Citas.php'); // Asegúrate de incluir la clase correcta para las citas

$obj_Cita = new Cita(); // Instancia la clase de citas
$arr_citas = $obj_Cita->buscarTodos(); // Obtén todas las citas

?>

<section id="tabla-citas" class="mt-5 mb-5">
  <div class="container">
    <div class="row mb-5">
      <div class="col">
        <h3>Citas para Dentista</h3>
      </div>

      <div class="col center">
        <button type="button" class="btn btn-primary" id="btn-registro-cita">Agendar Cita</button>
      </div>
      
      <div class="table-responsive">
        <table class="table">
          <thead class="table-light">
            <tr>
              <td><b>#Id</b></td>
              <td><b>Fecha</b></td>
              <td><b>Hora</b></td>
              <td><b>Duración</b></td>
              <td><b>Motivo</b></td>
              <td><b>Opciones</b></td>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($arr_citas as $cita) { ?>
            <tr>
              <td><?php echo $cita['cita_id']; ?></td>
              <td><?php echo $cita['fecha']; ?></td>
              <td><?php echo $cita['hora']; ?></td>
              <td><?php echo $cita['duracion']; ?></td>
              <td><?php echo $cita['motivo']; ?></td>
              <td>
                <p><a type="button" class="btn btn-primary btn-table" title="Actualizar" onclick="actualizarCita(<?php echo $cita['cita_id']; ?>)">Editar</a></p>
                <p><a type="button" class="btn btn-primary btn-table" title="Eliminar" onclick="eliminarCita(<?php echo $cita['cita_id']; ?>)">Eliminar</a></p>
                <p><a type="button" class="btn btn-primary btn-table" title="Actualiazar" onclick="consultarCita(<?php echo $cita['cita_id'] ?>)">Detalle</a></p>
              </td>
            </tr>
            <?php } ?>
          </tbody>
        </table>
      </div>
    </div>  
  </div>
</section>
<script src="../sistema/citas/citas.js"></script>
