// Rutas
$(document).ready(function () {
  $("#btn_inicio").click(function () {
    $("#container").load("../sistema/inicio/frm_inicio_reportes.php");
  });

  $("#btn_articulos").click(function () {
    $("#container").load("../sistema/articulos/articulos.php");
  });

  $("#btn_proveedor").click(function () {
    $("#container").load("../sistema/proveedor/proveedor.php");
  });

  $("#btn_material").click(function () {
    $("#container").load("../sistema/material/material.php");
  });

  $("#btn_citas").click(function () {
    $("#container").load("../sistema/citas/citas.php");
  });

});
