<?php
	class Usuario
  	{
		// Agregar usuario
    	function agregarUsuario($rol, $persona, $pregunta, $nombreUsu, $contrasenia, $recuperacion, $estado)
    	{
			$SQL_Ins_Usuario =
			"	INSERT INTO usuario (usua_id_rol, usua_id_pers, usua_id_preg, usua_nombre, usua_contra, usua_respuesta, usua_estado)
				VALUES ($rol, $persona, $pregunta, '$nombreUsu', '$contrasenia', '$recuperacion', $estado);
			";

			$bd = new BD();
			$bd->abrirBD();
			$transaccion_1 = new Transaccion($bd->conexion);
			$transaccion_1->enviarQuery($SQL_Ins_Usuario);
			$bd->cerrarBD();
		}

		// Actualizar usuario
		function actualizarUsuario($rol, $usuario, $nombreUsu)
		{
			$SQL_Act_Usuario= 
			" 	UPDATE usuario
				SET usua_nombre = '$nombreUsu', usua_id_rol = $rol
				WHERE usua_id_usua = $usuario;
			";

			$bd = new BD();
			$bd->abrirBD();
			$transaccion_1 = new Transaccion($bd->conexion);
			$transaccion_1->enviarQuery($SQL_Act_Usuario);
			$bd->cerrarBD();
		}

		// Eliminar usuario
		function eliminarUsuario($usuario)
		{
			$SQL_Eli_Usuario= 
			" 	DELETE FROM usuario
				WHERE usua_id_usua = $usuario;
			";

			$bd = new BD();
			$bd->abrirBD();
			$transaccion_1 = new Transaccion($bd->conexion);
			$transaccion_1->enviarQuery($SQL_Eli_Usuario);
			$bd->cerrarBD();
		}

		// Buscar usuario
		function buscarUsuario($intIdUsuario)
		{
			$SQL_Bus_Usuario = 
			"	SELECT usua_id_usua, usua_id_rol, usua_id_preg, usua_nombre, usua_contra, usua_respuesta
				FROM rol, usuario
				WHERE rol_id_rol = usua_id_rol AND usua_id_usua = $intIdUsuario;
			";

			$bd = new BD();
			$bd->abrirBD();
			$transaccion_1 = new Transaccion($bd->conexion);
			$transaccion_1->enviarQuery($SQL_Bus_Usuario);
			$obj_Usuario = $transaccion_1->traerObjeto(0);
			$bd->cerrarBD();
			return ($transaccion_1->traerObjeto(0));
		}

		// Buscar usuario
		function buscarResetContra($usuario, $pregunta, $recuperacion)
		{
			$SQL_Bus_Usuario = 
			"	SELECT *
				FROM usuario
				WHERE usua_nombre = '$usuario' AND usua_id_preg = $pregunta AND usua_respuesta = '$recuperacion' AND usua_estado = TRUE;
			";

			$bd = new BD();
			$bd->abrirBD();
			$transaccion_1 = new Transaccion($bd->conexion);
			$transaccion_1->enviarQuery($SQL_Bus_Usuario);
			$obj_Usuario = $transaccion_1->traerObjeto(0);
			$bd->cerrarBD();
			return ($transaccion_1->traerObjeto(0));
		}

		// Buscar todos los usuarios
		function buscarTodosUsuarios()
		{
			$SQL_Bus_usuarios =
			"	SELECT pers_id_pers, usua_id_usua, pers_nombre, pers_primer_ape, pers_segundo_ape, usua_estado, rol_nombre
				FROM persona, usuario , rol r
				WHERE pers_id_pers = usua_id_pers AND rol_id_rol = usua_id_rol AND rol_id_rol <> 5
				ORDER BY usua_id_usua ASC;
			";

			$bd = new BD();
			$bd->abrirBD();
			$transaccion_1 = new Transaccion($bd->conexion);
			$transaccion_1->enviarQuery($SQL_Bus_usuarios);
			$bd->cerrarBD();
			return ($transaccion_1->traerRegistros());
		}

		// Buscar nombre de usuario
		function buscarNombreUsuario($nombreUsu)
		{
			$SQL_Bus_Usuario = 
			"	SELECT usua_id_usua, usua_id_rol, usua_id_preg, usua_nombre, usua_contra, usua_respuesta
				FROM rol, usuario
				WHERE rol_id_rol = usua_id_rol AND usua_nombre = '$nombreUsu';
			";

			$bd = new BD();
			$bd->abrirBD();
			$transaccion_1 = new Transaccion($bd->conexion);
			$transaccion_1->enviarQuery($SQL_Bus_Usuario);
			$obj_Usuario = $transaccion_1->traerObjeto(0);
			$bd->cerrarBD();
			return ($transaccion_1->traerObjeto(0));
		}

		// Buscar nombre de usuario
		function buscarUsuarioPersona($persona)
		{
			$SQL_Bus_Usuario = 
			"	SELECT usua_id_usua, usua_id_rol, usua_id_preg, usua_nombre, usua_contra, usua_respuesta
				FROM usuario
				WHERE usua_id_pers = $persona;
			";

			$bd = new BD();
			$bd->abrirBD();
			$transaccion_1 = new Transaccion($bd->conexion);
			$transaccion_1->enviarQuery($SQL_Bus_Usuario);
			$obj_Usuario = $transaccion_1->traerObjeto(0);
			$bd->cerrarBD();
			return ($transaccion_1->traerObjeto(0));
		}

		// Modificar estatus
		function modificarEstatus($usuario, $estatus)
		{
			$SQL_Persona_Est="
			UPDATE usuario
			SET usua_estado = $estatus
			WHERE usua_id_usua = $usuario";


			$bd = new BD();
			$bd->abrirBD();
			$transaccion_1 = new Transaccion($bd->conexion);
			$transaccion_1->enviarQuery($SQL_Persona_Est);
			$bd->cerrarBD();
		}

		// Actualizar contraseña
		function actualizarContrasena($usuario, $contra)
		{
			$SQL_Act_Usuario= 
			" 	UPDATE usuario
				SET usua_contra = '$contra'
				WHERE usua_id_usua = $usuario;
			";

			$bd = new BD();
			$bd->abrirBD();
			$transaccion_1 = new Transaccion($bd->conexion);
			$transaccion_1->enviarQuery($SQL_Act_Usuario);
			$bd->cerrarBD();
		}

		// Restablecer contraseña
		function resetContrasena($usuario)
		{
			$characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ#$%&/._-';
			$charactersLength = strlen($characters);
			$contra = '';
			for ($i = 0; $i < 9; $i++) {
				$contra .= $characters[rand(0, $charactersLength - 1)];
			}

			$SQL_Act_Usuario= 
			" 	UPDATE usuario
				SET usua_contra = '$contra'
				WHERE usua_id_usua = $usuario;
			";

			$bd = new BD();
			$bd->abrirBD();
			$transaccion_1 = new Transaccion($bd->conexion);
			$transaccion_1->enviarQuery($SQL_Act_Usuario);
			$bd->cerrarBD();

			return $contra;
		}
	}
?>
