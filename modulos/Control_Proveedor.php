<?php
  include('../clases/BD.php');
  include('../clases/Proveedor.php');

  setlocale(LC_ALL,"es_ES");
  date_default_timezone_set("America/Mexico_City");
  $obj_Proveedor = new Proveedor();
 
  if($_POST['dml'] == 'insert')
  {
   $prov_descrip = $_POST['nombProd'];
   $obj_Proveedor->agregarProveedor($prov_descrip);

   echo 1;

  }else if ($_POST['dml'] == 'update') {
   $prov_descrip = $_POST['nombProd'];
   $proveedor = $_POST['id'];
   $obj_Proveedor->modificarProveedor($proveedor, $prov_descrip);
    echo 1;

  }elseif($_POST['dml'] == 'delete')
  {
    $proveedor = $_POST['id'];
    $obj_Proveedor->eliminarProveedor($proveedor);
    echo 1;
  }

?>

