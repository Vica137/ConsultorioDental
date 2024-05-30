<?php
  class Material
  {
    function buscarTodos(){
      $SQL_Bus_Material = 
      "SELECT * FROM material";

		  $bd = new BD();
		  $bd->abrirBD();
		  $transaccion_1 = new Transaccion($bd->conexion);
		  $transaccion_1->enviarQuery($SQL_Bus_Material);
		  $bd->cerrarBD();
		  return ($transaccion_1->traerRegistros());
    }

    function agregarMaterial($mat_descrip)
    {
        $SQL_Ins_Material = 
        "INSERT INTO material(mate_descrip)
         VALUES ('$mat_descrip')";

        $bd = new BD();
        $bd->abrirBD();
        $transaccion_1 = new Transaccion($bd->conexion);
        $transaccion_1->enviarQuery($SQL_Ins_Material);
        $bd->cerrarBD();

    }

    function modificarMaterial($material, $mat_descrip){
      $SQL_Mod_Material =
      "UPDATE material 
      SET mate_descrip = '$mat_descrip'
      WHERE mate_id_material = '$material' ";

        $bd = new BD();
        $bd->abrirBD();
        $transaccion_1 = new Transaccion($bd->conexion);
        $transaccion_1->enviarQuery($SQL_Mod_Material);
        $bd->cerrarBD();
    }

    function eliminarMaterial($material){
      $SQL_Eli_Material = 
			" DELETE FROM material
				WHERE mate_id_material = $material;
			";

      $bd = new BD();
      $bd->abrirBD();
      $transaccion_1 = new Transaccion($bd->conexion);
      $transaccion_1->enviarQuery($SQL_Eli_Material);
      $bd->cerrarBD();
    }

    function buscarMaterial($intMaterial){
      
      $SQL_Bus_Material = 
      "SELECT mate_id_material,
        mate_descrip
          FROM material 
          WHERE mate_id_material = $intMaterial;
      ";
  
      $bd = new BD();
      $bd->abrirBD();
      $transaccion_1 = new Transaccion($bd->conexion);
      $transaccion_1->enviarQuery($SQL_Bus_Material);
      $obj_Curso = $transaccion_1->traerObjeto(0);
      $bd->cerrarBD();
      return ($transaccion_1->traerObjeto(0));
    }

   
  }
?>