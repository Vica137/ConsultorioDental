<?php
  include('../clases/BD.php');
  include('../clases/Proveedor.php');

  setlocale(LC_ALL,"es_ES");
  date_default_timezone_set("America/Mexico_City");
  $obj_Proveedor = new Proveedor();
 
  if($_POST['dml'] == 'insert')
  {
   $descrip = $_POST['descrip'];
   $obj_Proveedor->agregarProveedor($descrip);

   echo 1;
  }
  else if ($_POST['dml'] == 'update') {
   $descrip = $_POST['descrip'];
   $proveedor = $_POST['id'];
   $obj_Proveedor->modificarProveedor($proveedor, $descrip);
    echo 1;
  }
  elseif($_POST['dml'] == 'delete')
  {
    $proveedor = $_POST['id'];

    $obj_Proveedor->eliminarProveedor($proveedor);
    echo 1;
  }

?>
