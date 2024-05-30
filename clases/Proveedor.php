<?php
  class Proveedor
  {
    function buscarTodos(){
      $SQL_Bus_Proveedor = 
      "SELECT * FROM proveedor";

      $bd = new BD();
      $bd->abrirBD();
      $transaccion_1 = new Transaccion($bd->conexion);
      $transaccion_1->enviarQuery($SQL_Bus_Proveedor);
      $bd->cerrarBD();
      return ($transaccion_1->traerRegistros());
    }

    function agregarProveedor($prov_descrip){

        $SQL_And_Proveedor = 
        "INSERT INTO proveedor(prove_descrip)
        VALUES ('$prov_descrip')";

        $bd = new BD();
        $bd->abrirBD();
        $transaccion_1 = new Transaccion($bd->conexion);
        $transaccion_1->enviarQuery($SQL_And_Proveedor);
        $bd->cerrarBD();
    }

    function modificarProveedor($proveedor, $prov_descrip){
      $SQL_Mod_Proveedor =
      "UPDATE proveedor 
      SET prove_descrip = '$prov_descrip'
      WHERE prove_id_prove = '$proveedor' ";

        $bd = new BD();
        $bd->abrirBD();
        $transaccion_1 = new Transaccion($bd->conexion);
        $transaccion_1->enviarQuery($SQL_Mod_Proveedor);
        $bd->cerrarBD();
    }

    function eliminarProveedor($proveedor){
      $SQL_Eli_Prov = 
      " DELETE FROM proveedor
        WHERE prove_id_prove = $proveedor;
      ";

      $bd = new BD();
      $bd->abrirBD();
      $transaccion_1 = new Transaccion($bd->conexion);
      $transaccion_1->enviarQuery($SQL_Eli_Prov);
      $bd->cerrarBD();
    }

    function buscarProveedor($intProveedor){
      
      $SQL_Bus_Proveedor = 
      "SELECT prove_id_prove,
        prove_descrip
          FROM proveedor 
          WHERE prove_id_prove = $intProveedor;
      ";
  
      $bd = new BD();
      $bd->abrirBD();
      $transaccion_1 = new Transaccion($bd->conexion);
      $transaccion_1->enviarQuery($SQL_Bus_Proveedor);
      $obj_Curso = $transaccion_1->traerObjeto(0);
      $bd->cerrarBD();
      return ($transaccion_1->traerObjeto(0));
    }

   
  }
?>