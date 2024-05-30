<?php
  include('../../clases/BD.php');
  include('../../clases/Proveedor.php');

  if (isset($_POST['id'])) {
    $obj_Proveedor = new Proveedor();
    $proveedor = $obj_Proveedor->buscarProveedor($_POST['id']);
  }

?>

<section id="formulario" class="mt-5 mb-5">
  <div class="container">
    <form id="form_proveedor" name="form_proveedor" enctype='multipart/form-data' method="POST" class="mt-4 mb-4">

      <div class="row">
        <h3 class="mb-4">Registrar Proveedores</h3>
        <div class="col-12">
          <div class="mb-3">
            <label for="nombProd" class="form-label">Nombre del proveedor</label>
            <input type="text" class="form-control" id="nombProd" name=
            "nombProd" value="<?php echo isset($proveedor)?$proveedor->prove_descrip:"";?>">
          </div>
        </div>

         <div class="col-12">
          <div class="mb-3">

        <?php if (isset($_POST['CRUD'])) { ?>
          <?php if ($_POST['CRUD'] == 1) { ?>
            <button id="btn-actualizar-proveedor" type="button" class="btn btn-success btn-footer">Actualizar</button> 
            <input type="hidden" name="dml" value="update"/>
            <input type="hidden" name="id" value="<?php echo $_POST['id']; ?>"/>              
          <?php } ?>
           <?php }else{ ?>
            <button type="button" class="btn btn-primary" id="btn-agregar-proveedor">Enviar</button>
            <input type="hidden" name="dml" value="insert"/>
             <?php } ?>
          </div>
        </div>

      </div>
    </form>
  </div>
</section>
<script src="../sistema/proveedor/proveedor.js"></script>
