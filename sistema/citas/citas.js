$(document).ready(function () {
  $("#btn-registro-cita").click(function () {
    $("#container").load("../sistema/citas/frm_citas.php");
    $("html, body").animate({ scrollTop: 0 }, 0);
  });
});

// Validar el formulario
function validarFormularioCita() {

  if ($("#paciente_id").val() == "") {
    $("html, body").animate({ scrollTop: 0 }, "slow");
    $("#paciente_id").focus();
    alertify.error("Debe ingresar el ID del paciente");
    return false;
  }

  if ($("#fecha").val() == "") {
    $("html, body").animate({ scrollTop: 0 }, "slow");
    $("#fecha").focus();
    alertify.error("Debe ingresar la fecha");
    return false;
  }

  if ($("#hora").val() == "") {
    $("html, body").animate({ scrollTop: 0 }, "slow");
    $("#hora").focus();
    alertify.error("Debe ingresar la hora");
    return false;
  }
  
  return true; // Devuelve true si el formulario es válido
}

// Agregar cita
$("#btn-agregar-cita").click(function () {
  if (validarFormularioCita()) {
    var parametros = new FormData($("#form_cita")[0]);
    $.ajax({
      data: parametros,
      url: "../modulos/Control_Citas.php",
      type: "POST",
      contentType: false,
      processData: false,
      success: function(response) {
        console.log(response);
        if (response == 1) {
          alertify.success("La cita se agendó correctamente");
          setTimeout(function () {
            $("html, body").animate({ scrollTop: 0 }, 0);
            $("#container").load("../sistema/citas/citas.php");
          }, 0);
        } else {
          alertify.error("Hubo un problema al agendar la cita");
        }
      }
    });
  }
});

// Actualizar cita
function actualizarCita(id) {
  var datos = {
    id: id,
    CRUD: 1,
  };

  $.ajax({
    data: datos,
    type: "POST",
    url: "../sistema/citas/frm_citas.php",
    success: function (data) {
      $("html, body").animate({ scrollTop: 0 }, 0);
      $("#container").html(data);
    },
  });
}

$(document).ready(function () {
  $("#btn-actualizar-cita").click(function () {
    var parametros = new FormData($("#form_cita")[0]);
    $.ajax({
      data: parametros,
      url: "../modulos/Control_Citas.php",
      type: "POST",
      contentType: false,
      processData: false,
      success: function (respuesta) {
        console.log(respuesta);
        if (respuesta == 1) {
          alertify.success("La cita se actualizó correctamente");
          setTimeout(function () {
            $("html, body").animate({ scrollTop: 0 }, 0);
            $("#container").load("../sistema/citas/citas.php");
          }, 0);
        } else {
          alertify.error("Hubo un problema al actualizar la cita");
        }
      },
    });
    return false;
  });
});

// Eliminar cita
function eliminarCita(id) {
  var mensaje = "¿Está seguro de eliminar la cita ";
  mensaje = mensaje.concat("?");
  var titulo = "Eliminar Cita";
  
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
        url: "../modulos/Control_Citas.php",
        success: function (respuesta) {
          console.log(respuesta);
          if (respuesta == 1) {
            alertify.success("Se eliminó correctamente la cita");
            setTimeout(function () {
              $("html, body").animate({ scrollTop: 0 }, 0);
              $("#container").load("../sistema/citas/citas.php");
            }, 100);
          } else {
            alertify.error("Hubo un problema al eliminar la cita");
          }
        },
      });
    },
    function () {
      alertify.confirm().close();
    }
  );
}

// Consultar cita
function consultarCita(id) {
  var datos = {
    id: id,
    CRUD: 0,
  };

  $.ajax({
    data: datos,
    type: "POST",
    url: "../sistema/citas/frm_citas.php",
    success: function (data) {
      $("html, body").animate({ scrollTop: 0 }, 0);
      $("#container").html(data);
    },
  });
}
