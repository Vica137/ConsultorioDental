<?php
  include('../../clases/BD.php');
  include('../../clases/Material.php');

  if (isset($_POST['id'])) {
    $obj_Material = new Material();
    $material = $obj_Material->buscarMaterial($_POST['id']);
  }

?>

<section id="formulario" class="mt-5 mb-5">
  <div class="container">
    <form id="form_material" name="form_material" enctype='multipart/form-data' method="POST" class="mt-4 mb-4">

      <div class="row">
        <h3 class="mb-4">Registrar Materiales</h3>
        <div class="col-12">
          <div class="mb-3">
            <label for="nombProd" class="form-label">Material</label>
            <input type="text" class="form-control" id="nombProd" name=
            "nombProd" value="<?php echo isset($material)?$material->mate_descrip:"";?>">
          </div>
        </div>

         <div class="col-12">
          <div class="mb-3">

        <?php if (isset($_POST['CRUD'])) { ?>
          <?php if ($_POST['CRUD'] == 1) { ?>
            <button id="btn-actualizar-material" type="button" class="btn btn-success btn-footer">Actualizar</button> 
            <input type="hidden" name="dml" value="update"/>
            <input type="hidden" name="id" value="<?php echo $_POST['id']; ?>"/>              
          <?php } ?>
           <?php }else{ ?>
            <button type="button" class="btn btn-primary" id="btn-agregar-material">Enviar</button>
            <input type="hidden" name="dml" value="insert"/>
             <?php } ?>
          </div>
        </div>

      </div>
    </form>
  </div>
</section>
<script src="../sistema/material/material.js"></script>
