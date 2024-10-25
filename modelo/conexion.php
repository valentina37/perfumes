<!-- modelo/conexion.php -->
<?php
class conexion
{
  static public function conectar()
  {
    try {
      $link = new PDO(
        "mysql:host=localhost;dbname=webservice",
        "root",
        ""
      );
      // Establecer el modo de error para lanzar excepciones
      $link->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      // Establecer el conjunto de caracteres a UTF-8
      $link->exec("set names utf8");
      return $link;
    } catch (PDOException $e) {
      // Manejar errores de conexión
      echo "Error al conectar a la base de datos: " . $e->getMessage();
      die();
    }
  }
}
/* la base de datos debe estar funcionando, con formularios */