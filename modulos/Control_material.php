<?php
  include('../clases/BD.php');
  include('../clases/Material.php');

  setlocale(LC_ALL,"es_ES");
  date_default_timezone_set("America/Mexico_City");
  $obj_Material = new Material();
 
  if($_POST['dml'] == 'insert')
  {
   $mat_descrip = $_POST['nombProd'];
   $obj_Material->agregarMaterial($mat_descrip);

   echo 1;
  }else if ($_POST['dml'] == 'update') {
   $mat_descrip = $_POST['nombProd'];
   $material = $_POST['id'];
   $obj_Material->modificarMaterial($material, $mat_descrip);
    echo 1;

  }elseif($_POST['dml'] == 'delete')
  {
    $material = $_POST['id'];
    $obj_Material->eliminarMaterial($material);
    echo 1;
  }

?>

