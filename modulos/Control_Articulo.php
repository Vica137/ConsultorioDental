<?php
  include('../clases/BD.php');
  include('../clases/Articulo.php');

  setlocale(LC_ALL,"es_ES");
  date_default_timezone_set("America/Mexico_City");
  $obj_Articulo = new Articulo();
 
  if($_POST['dml'] == 'insert')
  {
   $nombProd = $_POST['nombProd'];
   $descripcion = $_POST['descripcion'];
   $tipoMaterial = $_POST['tipoMaterial'];
   $proveedor = $_POST['proveedor'];
   $fecha = $_POST['fecha'];
   $nacionalidad = $_POST['nacionalidad'];
   $obj_Articulo->agregarArticulo($nombProd, $descripcion, $tipoMaterial, $proveedor, $fecha, $nacionalidad);

   echo 1;
  }else if ($_POST['dml'] == 'update') {
   $nombProd = $_POST['nombProd'];
   $descripcion = $_POST['descripcion'];
   $tipoMaterial = $_POST['tipoMaterial'];
   $proveedor = $_POST['proveedor'];
   $fecha = $_POST['fecha'];
   $nacionalidad = $_POST['nacionalidad'];
   $articulo = $_POST['id'];
   $obj_Articulo->modificarArticulo($articulo,$nombProd, $descripcion, $tipoMaterial, $proveedor, $fecha, $nacionalidad);
    echo 1;
  }elseif($_POST['dml'] == 'delete')
  {
    $articulo = $_POST['id'];

    $obj_Articulo->eliminarArticulo($articulo);
    echo 1;
  }

?>

