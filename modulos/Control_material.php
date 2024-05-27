<?php
include('../clases/BD.php');
include('../clases/Material.php');

setlocale(LC_ALL,"es_ES");
date_default_timezone_set("America/Mexico_City");
$obj_Material = new Material();

if ($_POST['dml'] == 'insert') {
    $descripcion = $_POST['descripcion'];
    $obj_Material->agregarMaterial($descripcion);
    echo 1;
} elseif ($_POST['dml'] == 'update') {
    $id = $_POST['id'];
    $descripcion = $_POST['descripcion'];
    $obj_Material->modificarMaterial($id, $descripcion);
    echo 1;
} elseif ($_POST['dml'] == 'delete') {
    $id = $_POST['id'];
    $obj_Material->eliminarMaterial($id);
    echo 1;
} 
?>

