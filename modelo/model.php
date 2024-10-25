<!-- modelo/model.php -->
<?php
class EnlacesPaginas
{
  public static function EnlacesPaginasModel($enlacesmodel)
  {
    $module = "";  // Establece un valor predeterminado

    if (
      $enlacesmodel == "Inicio" ||
      $enlacesmodel == "InicioAdmin" ||
      $enlacesmodel == "Nosotros" ||
      $enlacesmodel == "Servicios" ||
      $enlacesmodel == "Ingresar" ||
      $enlacesmodel == "Registro" ||
      $enlacesmodel == "Contactenos" ||
      $enlacesmodel == "Salir" ||
      $enlacesmodel == "Eliminar" ||
      $enlacesmodel == "Editar"
    ) {
      $module = "vista/modulos/" . $enlacesmodel . ".php";
    }
    return $module;
  }
}
?>