<?php
class Material
{
    function agregarMaterial($descripcion) {
        $SQL_Ins_Material = 
        "INSERT INTO material(mate_descrip)
         VALUES ('$descripcion')";

        $bd = new BD();
        $bd->abrirBD();
        $transaccion = new Transaccion($bd->conexion);
        $transaccion->enviarQuery($SQL_Ins_Material);
        $bd->cerrarBD();
    }

    function modificarMaterial($id, $descripcion) {
        $SQL_Act_Material = 
        "UPDATE material
          SET mate_descrip = '$descripcion'
          WHERE mate_id_material = $id";

        $bd = new BD();
        $bd->abrirBD();
        $transaccion = new Transaccion($bd->conexion);
        $transaccion->enviarQuery($SQL_Act_Material);
        $bd->cerrarBD();
    }

    function eliminarMaterial($id) {
        $SQL_Eli_Material = 
        "DELETE FROM material
          WHERE mate_id_material = $id";

        $bd = new BD();
        $bd->abrirBD();
        $transaccion = new Transaccion($bd->conexion);
        $transaccion->enviarQuery($SQL_Eli_Material);
        $bd->cerrarBD();
    }

    function buscarTodos() {
        $SQL_Bus_Material = 
        "SELECT * FROM material";

        $bd = new BD();
        $bd->abrirBD();
        $transaccion = new Transaccion($bd->conexion);
        $transaccion->enviarQuery($SQL_Bus_Material);
        $bd->cerrarBD();
        return $transaccion->traerRegistros();
    }

    function buscarMaterial($id) {
        $SQL_Bus_Material = 
        "SELECT * FROM material
          WHERE mate_id_material = $id";

        $bd = new BD();
        $bd->abrirBD();
        $transaccion = new Transaccion($bd->conexion);
        $transaccion->enviarQuery($SQL_Bus_Material);
        $material = $transaccion->traerObjeto(0);
        $bd->cerrarBD();
        return $material;
    }
}
?>
