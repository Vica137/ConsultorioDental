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


// Manejo del historial
  let historyStack = [];

  function loadPage(url) {
    historyStack.push(url);
    $("#container").load(url);
  }



  // Acción del botón de regreso
  $("#btn_back").click(function () {
    if (historyStack.length > 1) {
      historyStack.pop(); // Elimina la página actual
      let previousPage = historyStack.pop(); // Obtiene la página anterior
      loadPage(previousPage); // Carga la página anterior
    } else {
      alert("No hay página anterior para regresar.");
    }
  });

});
