<?php
  include('../clases/Cuenta.php');

  $obj_Cuenta = new Cuenta();
  $cuenta = $obj_Cuenta->buscarUsuarioSistema($_strUsuario, $_strContrasena);
?>

<!-- Archivo para cargar el header y referencias -->
<?php include_once '../sistema/recursos/header.php';?>

<!-- Sección dinámica -->
<section id="container">
  <?php include_once '../sistema/inicio/frm_inicio_reportes.php';?>
</section>

<!-- Archivo para cargar el footer y los scripts -->
<?php include_once '../sistema/recursos/footer.php';?>
