$(document).ready(function () {
  $("#btn-registro-proveedor").click(function () {
    $("#container").load("../sistema/proveedor/frm_proveedor.php");
    $("html, body").animate({ scrollTop: 0 }, 0);
  });
});

// Validar el formulario
function validarFormularioProveedor() {
  if ($("#prove_descrip").val() == "") {
    $("html, body").animate({ scrollTop: 0 }, "slow");
    document.getElementById("prove_descrip").focus();
    alertify.error("Debe ingresar la descripción del proveedor");
    return false;
  }

  return true;
}

// Registrar proveedor
$("#btn-agregar-proveedor").click(function () {
  if (validarFormularioProveedor()) {
    var parametros = new FormData($("#form_proveedor")[0]);
    $.ajax({
      data: parametros,
      url: "../modulos/Control_Proveedor.php",
      type: "POST",
      contentType: false,
      processData: false,
      success: function (response) {
        console.log(response);
        if (response == 1) {
          alertify.success("El proveedor se registró correctamente");
          setTimeout(function () {
            $("html, body").animate({ scrollTop: 0 }, 0);
            $("#container").load("../sistema/proveedor/proveedor.php");
          }, 0);
        } else {
          alertify.error("Hubo un problema al registrar el proveedor");
        }
      },
    });
  }
});

// Actualizar proveedor
$("#btn-actualizar-proveedor").click(function () {
  if (validarFormularioProveedor()) {
    var parametros = new FormData($("#form_proveedor")[0]);
    $.ajax({
      data: parametros,
      url: "../modulos/Control_Proveedor.php",
      type: "POST",
      contentType: false,
      processData: false,
      success: function (respuesta) {
        console.log(respuesta);
        if (respuesta == 1) {
          alertify.success("El proveedor se actualizó correctamente");
          setTimeout(function () {
            $("html, body").animate({ scrollTop: 0 }, 0);
            $("#container").load("../sistema/proveedor/proveedor.php");
          }, 0);
        } else {
          alertify.error("Hubo un problema al actualizar el proveedor");
        }
      },
    });
  }
});

// Eliminar proveedor
function eliminarProveedor(id, proveedor) {
  var mensaje = "¿Está seguro de eliminar el proveedor ";
  mensaje = mensaje.concat(proveedor.bold());
  mensaje = mensaje.concat("?");

  var titulo = "Eliminar Proveedor";
  alertify.confirm(
    titulo,
    mensaje,
    function () {
      var dml = "delete";
      var datos = {
        id: id,
        dml: dml,
      };
      $.ajax({
        data: datos,
        type: "POST",
        url: "../modulos/Control_Proveedor.php",
        success: function (respuesta) {
          console.log(respuesta);
          if (respuesta == 1) {
            alertify.success("Se eliminó correctamente el proveedor");
            setTimeout(function () {
              $("html, body").animate({ scrollTop: 0 }, 0);
              $("#container").load("../sistema/proveedor/proveedor.php");
            }, 100);
          } else {
            alertify.error("Hubo un problema al eliminar el proveedor");
          }
        },
      });
    },
    function () {
      alertify.confirm().close();
    }
  );
}

// Consultar proveedor
function consultarProveedor(id) {
  var datos = {
    id: id,
    CRUD: 0,
  };

  $.ajax({
    data: datos,
    type: "POST",
    url: "../sistema/proveedor/frm_proveedor.php",
    success: function (data) {
      $("html, body").animate({ scrollTop: 0 }, 0);
      $("#container").html(data);
    },
  });
}
