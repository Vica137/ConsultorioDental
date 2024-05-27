<?php
  include('../../clases/BD.php');
  include('../../clases/Material.php');

  $obj_Material = new Material();
  $arr_material = $obj_Material->buscarTodos();
?>

<section id="tabla-materiales" class="mt-5 mb-5">
  <div class="container">
    <div class="row mb-5">
      <div class="col">
        <h3>Materiales Dentales</h3>
      </div>

      <div class="col center">
        <button type="button" class="btn btn-primary" id="btn-registro-material">Agregar Material</button>
      </div>
      
      <div class="table-responsive">
        <table class="table">
          <thead class="table-light">
            <tr>
              <td><b>#Id</b></td>
              <td><b>Descripción del Material</b></td>
              <td><b>Opciones</b></td>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($arr_material as $material) { ?>
            <tr>
              <td><?php echo $material['mate_id_material']; ?></td>
              <td><?php echo $material['mate_descrip']; ?></td>
              <td>
                <p><a type="button" class="btn btn-primary btn-table" title="Actualizar" onclick="actualizarMaterial(<?php echo $material['mate_id_material'] ?>)">Editar</a></p>
                <p><a type="button" class="btn btn-primary btn-table" title="Eliminar" onclick="eliminarMaterial(<?php echo $material['mate_id_material'] ?>, '<?php echo $material['mate_descrip'] ?>')">Eliminar</a></p>
                <p><a type="button" class="btn btn-primary btn-table" title="Consultar" onclick="consultarMaterial(<?php echo $material['mate_id_material'] ?>)">Detalle</a></p>
              </td>
            </tr>
            <?php } ?>
          </tbody>
        </table>
      </div>
    </div>  
  </div>
</section>
<script src="../sistema/material/material.js"></script>
