<?php
  include('../../clases/BD.php');
  include('../../clases/Proveedor.php');

  $obj_Proveedor = new Proveedor();
  $arr_proveedor = $obj_Proveedor->buscarTodos();
?>

 <section id="tabla-articulos" class="mt-5 mb-5">
  <div class="container">
    <div class="row mb-5">
      <div class="col">
        <h3>Proveedores</h3>
      </div>

      <div class="col center">
        <button type="button" class="btn btn-primary" id="btn-registro-proveedor">Añadir Proveedor</button>
      </div>
      
      <div class="table-responsive">
          <table class="table">
              <thead class="table-light">
                <tr>
                  <td><b>#Id</b></td>
                  <td><b>Nombre del proveedor</b></td>
                </tr>
              </thead>
              <tbody>

                <?php foreach ($arr_proveedor as $proveedor) { ?>
                <tr>
                   <td><?php echo $proveedor['prove_id_prove']; ?></td>
                   <td><?php echo $proveedor['prove_descrip']; ?></td>

                    <td>
                      <p ><a type="button" class="btn btn-primary btn-table" title="Actualizar" onclick="actualizarProveedor(<?php echo $proveedor['prove_id_prove'] ?>)">Editar</a></p>
                      <p><a type="button" class="btn btn-primary btn-table" title="Eliminar" onclick="eliminarProv(<?php echo $proveedor['prove_id_prove'] ?>, '<?php echo $proveedor['prove_id_prove'] ?>')">Eliminar</a></p>
                      <p><a type="button" class="btn btn-primary btn-table" title="Actualizar" onclick="consultarProveedor(<?php echo $proveedor['prove_id_prove'] ?>)">Detalle</a></p>
                    </td>
                </tr>
                <?php } ?>
              </tbody>
          </table>
      </div>
    </div>  
  </div>
</section>
<script src="../sistema/proveedor/proveedor.js"></script>