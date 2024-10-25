<!-- vista/index.php -->
<?php
// Requiere una sola vez el archivo controler.php dentro de la carpeta control
require_once "control/controler.php";
require_once "control/formularios.php";

// Requiere la conexión a la base de datos y el modelo
require_once "modelo/model.php";
// se elimina y se crea en modeloformularios
//require_once "modelo/conexion.php";
require_once "modelo/modeloformularios.php";

// Realiza la conexión a la base de datos
//$mostrar = conexion::conectar();

// Aquí puedes realizar consultas y operaciones con la base de datos utilizando $mostrar
//echo '<pre>'; print_r($mostrar); echo '</pre>';
// Crear una instancia de la clase MvcController
$mvc = new MvcController();

// Llama al método plantilla para mostrar la página
$mvc->plantilla();
?>