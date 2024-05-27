<?php
  class Proveedor
  {
    function agregarProveedor($descrip)
    {
        $SQL_Ins_Proveedor = 
        "INSERT INTO proveedor(prove_descrip) VALUES ('$descrip')";

        $bd = new BD();
        $bd->abrirBD();
        $transaccion = new Transaccion($bd->conexion);
        $transaccion->enviarQuery($SQL_Ins_Proveedor);
        $bd->cerrarBD();

    }

  
    function eliminarProveedor($proveedor)
    {
      $SQL_Eli_Proveedor = 
      "DELETE FROM proveedor WHERE prove_id_prove = $proveedor";

      $bd = new BD();
      $bd->abrirBD();
      $transaccion = new Transaccion($bd->conexion);
      $transaccion->enviarQuery($SQL_Eli_Proveedor);
      $bd->cerrarBD();
    }

    function buscarTodos()
	  {
      $SQL_Bus_Proveedores = 
      "SELECT * FROM proveedor";

		  $bd = new BD();
		  $bd->abrirBD();
		  $transaccion = new Transaccion($bd->conexion);
		  $transaccion->enviarQuery($SQL_Bus_Proveedores);
		  $bd->cerrarBD();
		  return ($transaccion->traerRegistros());
    }


    function modificarProveedor($proveedor, $descrip)
    {
        $SQL_Act_Proveedor = 
        "UPDATE proveedor SET prove_descrip = '$descrip' WHERE prove_id_prove = $proveedor";

        $bd = new BD();
        $bd->abrirBD();
        $transaccion = new Transaccion($bd->conexion);
        $transaccion->enviarQuery($SQL_Act_Proveedor);
        $bd->cerrarBD();
    }

    function buscarProveedor($proveedor){

      $SQL_Bus_Proveedor = 
      "SELECT * FROM proveedor WHERE prove_id_prove = $proveedor";
  
      $bd = new BD();
      $bd->abrirBD();
      $transaccion = new Transaccion($bd->conexion);
      $transaccion->enviarQuery($SQL_Bus_Proveedor);
      $obj_Proveedor = $transaccion->traerObjeto(0);
      $bd->cerrarBD();
      return ($transaccion->traerObjeto(0));
    }
  }
?>
