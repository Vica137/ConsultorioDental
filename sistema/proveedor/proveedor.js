$(document).ready(function () {
    $("#btn-registro-proveedor").click(function () {
      $("#container").load("../sistema/proveedor/frm_proveedor.php");
      $("html, body").animate({ scrollTop: 0 }, 0);
    });
  });
  
  // Validar el formulario
  function validarFormularioEvento() {
  
    if ($("#nombProd").val() == "") {
      $("html, body").animate({ scrollTop: 0 }, "slow");
      document.getElementById("nombProd").focus();
      alertify.error("Debe ingresar el nombre del proveedor");
      return false;
    }

    return true;
  }
  
  
  // Registrar articlo
  $("#btn-agregar-proveedor").click(function () {
  
  if (validarFormularioEvento()) {
      var parametros = new FormData($("#form_proveedor")[0]);
      $.ajax({
          data: parametros,
          url: "../modulos/Control_Proveedor.php",
          type: "POST",
          contentType: false,
          processData: false,
          success: function(response)
          {
            console.log(response);
            if (response == 1) {
              alertify.success("El registro del proveedor se actualizó correctamente");
              setTimeout(function () {
                $("html, body").animate({ scrollTop: 0 }, 0);
                $("#container").load(
                  "../sistema/proveedor/proveedor.php"
                );
              }, 0);
            } else {
              alertify.error("Hubo un problema al registrar los datos del proveedor");
            }
          }
      });
      }
  });
  
  
  // Actualizar evento
  function actualizarProveedor(id) {
    var datos = {
      id: id,
      CRUD: 1,
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
  
  $(document).ready(function () {
    $("#btn-actualizar-proveedor").click(function () {
      
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
              alertify.success("El registro del proveedor se actualizó correctamente.");
              setTimeout(function () {
                $("html, body").animate({ scrollTop: 0 }, 0);
                $("#container").load(
                  "../sistema/proveedor/proveedor.php"
                );
              }, 0);
            } else {
              alertify.error("Hubo un problema al actualizar los datos del proveedor.");
            }
          },
        });
        return false;
    });
  })
  
  
  
  // Eliminar evento
  function eliminarProv(id,articulo) {
    var mensaje = "¿Esta seguro de eliminar el proveedor? ";
    mensaje = mensaje.concat(articulo.bold());
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
              alertify.success("Se elimino de manera correcta el proveedor");
              setTimeout(function () {
                $("html, body").animate({ scrollTop: 0 }, 0);
                $("#container").load(
                  "../sistema/proveedor/proveedor.php"
                );
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
  
  
  // Consultar evento
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
  