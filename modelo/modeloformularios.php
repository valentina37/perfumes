<?php
require_once  "conexion.php";
class modeloformularios
{

	static public function mdlregistro($tabla, $datos)
	{
		$declaracion = conexion::conectar()->prepare("INSERT INTO $tabla(nombre,apellido,correoElectronico,contrasena,direccion,telefono)
        /*modelo estatico publico usamos esas variables para conectarnos a la base de datos
		con el metodo PDO, para eso debo usar la instrucción prepare
		prepara una sentencia sql para ser ejecutada por el método PDO*/ 
		values(:nombre,:apellido,:correoElectronico,:contrasena,:direccion,:telefono)");
		//:nombre son parametros ocultos, con los : iniciales
		$declaracion->bindParam(":nombre", $datos["nombre"], PDO::PARAM_STR);
		$declaracion->bindParam(":apellido", $datos["apellido"], PDO::PARAM_STR);
		$declaracion->bindParam(":correoElectronico", $datos["correoElectronico"], PDO::PARAM_STR);
		$declaracion->bindParam(":contrasena", $datos["contrasena"], PDO::PARAM_STR);
		$declaracion->bindParam(":direccion", $datos["direccion"], PDO::PARAM_STR);
		$declaracion->bindParam(":telefono", $datos["telefono"], PDO::PARAM_STR);
		//bindParam convierte variables ocultos y que los convierta a datos del tipo PDO
		//PARAM_STR información en cadena de datos 
		//bindParam vincula una variable de php a un paramentro de sustitución 
		if ($declaracion->execute()) {
			//pregunta si la variable ya se ejecuto, si ya finalizo el proceso, retorne recibido
			return "recibido";
		} else {
			print_r(conexion::conectar()->errorInfo());
		}
		$declaracion = null; // Se cierra la conexión asignando null
	}

	static public function mdlseleccionRegistros($tabla, $item, $valor)
	{
		if ($item == null && $valor == null) {
			$declaracion = conexion::conectar()->prepare("SELECT *, DATE_FORMAT(fecha, '%d/%m/%Y') AS fecha FROM $tabla ORDER BY idcliente desc");
			$declaracion->execute();
			return $declaracion->fetchAll();
		} else {
			$declaracion = conexion::conectar()->prepare("SELECT *, DATE_FORMAT(fecha, '%d/%m/%Y') AS fecha FROM $tabla WHERE $item = :valor ORDER BY idcliente DESC");
			$declaracion->bindParam(":valor", $valor, PDO::PARAM_STR);
			$declaracion->execute();
			return $declaracion->fetch(); 
		}

		$declaracion = null; 
	}
	static public function mdlactualizarregistro($tabla, $datos)
	{
		$declaracion = Conexion::conectar()->prepare("UPDATE $tabla SET nombre = :nombre, apellido = :apellido, correoElectronico = :correoElectronico, contrasena = :contrasena, direccion = :direccion, telefono = :telefono WHERE idcliente = :idcliente");

		$declaracion->bindParam(":nombre", $datos["nombre"], PDO::PARAM_STR);
		$declaracion->bindParam(":apellido", $datos["apellido"], PDO::PARAM_STR);
		$declaracion->bindParam(":correoElectronico", $datos["correoElectronico"], PDO::PARAM_STR);
		$declaracion->bindParam(":contrasena", $datos["contrasena"], PDO::PARAM_STR);
		$declaracion->bindParam(":direccion", $datos["direccion"], PDO::PARAM_STR);
		$declaracion->bindParam(":telefono", $datos["telefono"], PDO::PARAM_STR);
		$declaracion->bindParam(":idcliente", $datos["idcliente"], PDO::PARAM_INT);

		if ($declaracion->execute()) {
			return "ok";
		} else {
			return "error";
		}

		$declaracion = closedir();
		$declaracion = null;
	}
	static public function mdleliminarregistro($tabla, $datos)
	{
		$declaracion = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE idcliente = :idcliente");
		$declaracion->bindParam(":idcliente", $datos, PDO::PARAM_INT);

		if ($declaracion->execute()) {
			return "OK";
		} else {
			return "error";
		}

		$declaracion = closedir();
		$declaracion = null;
	}
}
