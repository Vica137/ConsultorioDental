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
            $("#container").load("../sistema/citas/citas_vista.php");
          }, 1000);
        } else {
          alertify.error("Ocurrió un error, contacte con el administrador del sistema");
        }
      }
    });
  }
});

// Actualizar cita
$("#btn-actualizar-cita").click(function () {
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
          alertify.success("La cita se actualizó correctamente");
          setTimeout(function () {
            $("html, body").animate({ scrollTop: 0 }, 0);
            $("#container").load("../sistema/citas/citas_vista.php");
          }, 1000);
        } else {
          alertify.error("Ocurrió un error, contacte con el administrador del sistema");
        }
      }
    });
  }
});

// Eliminar cita
function eliminarCita(id) {
  alertify.confirm(
    "Eliminar una cita",
    "¿Seguro(a) que desea eliminar esta cita?",
    function () {
      var datos = {
        id: id,
        dml: "delete"
      };

      $.ajax({
        data: datos,
        url: "../modulos/Control_Citas.php",
        type: "POST",
        success: function(response) {
          console.log(response);
          if (response == 1) {
            alertify.success("La cita se eliminó correctamente");
            $("#container").load("../sistema/citas/citas_vista.php");
          } else {
            alertify.error("Ocurrió un error, contacte con el administrador del sistema");
          }
        }
      });
    },
    function () {
      alertify.error("Operación cancelada");
    }
  );
}
