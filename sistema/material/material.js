$(document).ready(function () {
  $("#btn-registro-material").click(function () {
    $("#container").load("../sistema/material/frm_material.php");
    $("html, body").animate({ scrollTop: 0 }, 0);
  });
});

// Validar el formulario
function validarFormularioEvento() {

  if ($("#nombProd").val() == "") {
    $("html, body").animate({ scrollTop: 0 }, "slow");
    document.getElementById("nombProd").focus();
    alertify.error("Debe ingresar el nombre del material");
    return false;
  }

  return true;
}


// Registrar articlo
$("#btn-agregar-material").click(function () {

if (validarFormularioEvento()) {
    var parametros = new FormData($("#form_material")[0]);
    $.ajax({
        data: parametros,
        url: "../modulos/Control_Material.php",
        type: "POST",
        contentType: false,
        processData: false,
        success: function(response)
        {
          console.log(response);
          if (response == 1) {
            alertify.success("El registro del material se actualizó correctamente");
            setTimeout(function () {
              $("html, body").animate({ scrollTop: 0 }, 0);
              $("#container").load(
                "../sistema/material/material.php"
              );
            }, 0);
          } else {
            alertify.error("Hubo un problema al registrar los datos del material");
          }
        }
    });
    }
});


// Actualizar evento
function actualizarMaterial(id) {
  var datos = {
    id: id,
    CRUD: 1,
  };

  $.ajax({
    data: datos,
    type: "POST",
    url: "../sistema/material/frm_material.php",
    success: function (data) {
      $("html, body").animate({ scrollTop: 0 }, 0);
      $("#container").html(data);
    },
  });
}

$(document).ready(function () {
  $("#btn-actualizar-material").click(function () {
    
      var parametros = new FormData($("#form_material")[0]);
      $.ajax({
        data: parametros,
        url: "../modulos/Control_Material.php",
        type: "POST",
        contentType: false,
        processData: false,
        success: function (respuesta) {
          console.log(respuesta);
          if (respuesta == 1) {
            alertify.success("El registro del material se actualizó correctamente.");
            setTimeout(function () {
              $("html, body").animate({ scrollTop: 0 }, 0);
              $("#container").load(
                "../sistema/material/material.php"
              );
            }, 0);
          } else {
            alertify.error("Hubo un problema al actualizar los datos del material.");
          }
        },
      });
      return false;
  });
})



// Eliminar evento
function elimiminarMaterial(id,articulo) {
  var mensaje = "¿Esta seguro de eliminar el material? ";
  mensaje = mensaje.concat(articulo.bold());
  mensaje = mensaje.concat("?");

  var titulo = "Eliminar Material";
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
        url: "../modulos/Control_Material.php",
        success: function (respuesta) {
          console.log(respuesta);
          if (respuesta == 1) {
            alertify.success("Se elimino de manera correcta el material");
            setTimeout(function () {
              $("html, body").animate({ scrollTop: 0 }, 0);
              $("#container").load(
                "../sistema/material/material.php"
              );
            }, 100);
          } else {
            alertify.error("Hubo un problema al eliminar el material");
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
function consularMaterial(id) {
  var datos = {
    id: id,
    CRUD: 0,
   };

  $.ajax({
    data: datos,
    type: "POST",
    url: "../sistema/material/frm_material.php",
    success: function (data) {
      $("html, body").animate({ scrollTop: 0 }, 0);
      $("#container").html(data);
    },
  });
}
