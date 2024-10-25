<!-- vista/modulos/Editar.php -->
<?php
// Ejemplo de verificación antes de permitir acceso a ciertas páginas
if (isset($_SESSION["validarIngreso"])) {
  if ($_SESSION["validarIngreso"] == "OK") {
      // Usuario autenticado
  } else {
      // Redirigir a la página de inicio de sesión
      header("Location: index.php?axn=Ingresar");
      exit();
  }
} else {
  // Redirigir a la página de inicio de sesión
  header("Location: index.php?axn=Ingresar");
  exit();
}

if (isset($_GET["idcliente"])) {
    $item = "idcliente";
    $valor = $_GET["idcliente"];
    $usuario = ctrlformulario::ctrlseleccionRegistros($item, $valor);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $actualizacion = ctrlformulario::ctrlactualizarregistro();
  if ($actualizacion == "ok") {
      echo '<script>
          alert("Los datos han sido actualizados exitosamente");
          window.location.href = "index.php?axn=InicioAdmin";
      </script>';
  } else {
      echo '<script>
          alert("Hubo un error al actualizar los datos");
      </script>';
  }
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Editar Usuario</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/css/bootstrap.min.css">
</head>

<body>
  <div class="container">
    <h1 class="mt-5 mb-4 text-center">Editar Usuario</h1>
    <div class="row">
      <div class="col-md-6">
        <form action="" method="POST">
          <input type="hidden" name="idcliente" value="<?php echo htmlspecialchars($usuario["idcliente"]); ?>">
          <div class="form-group">
            <label for="nombre">Nombre:</label>
            <input type="text" class="form-control" id="nombre" name="EditarNombre" value="<?php echo htmlspecialchars($usuario["nombre"]); ?>" required>
          </div>
          <div class="form-group">
            <label for="apellido">Apellido:</label>
            <input type="text" class="form-control" id="apellido" name="EditarApellido" value="<?php echo htmlspecialchars($usuario["apellido"]); ?>" required>
          </div>
          <div class="form-group">
            <label for="correo">Correo electrónico:</label>
            <input type="email" class="form-control" id="correo" name="EditarCorreoElectronico" value="<?php echo htmlspecialchars($usuario["correoElectronico"]); ?>" required>
          </div>
          <div class="form-group">
            <label for="clave">Clave:</label>
            <input type="password" class="form-control" id="contrasena" name="EditarContrasena" placeholder="Ingrese su nueva clave" required>
          </div>
      </div>
      <div class="col-md-6">
        <div class="form-group">
          <label for="direccion">Dirección:</label>
          <input type="text" class="form-control" id="direccion" name="EditarDireccion" value="<?php echo htmlspecialchars($usuario["direccion"]); ?>" required>
        </div>
        <div class="form-group">
          <label for="telefono">Teléfono:</label>
          <input type="number" class="form-control" id="telefono" name="EditarTelefono" value="<?php echo htmlspecialchars($usuario["telefono"]); ?>" required>
        </div>
        <div class="text-center mt-4">
          <button type="submit" class="btn btn-primary" name="submit">Actualizar</button>
          <button type="button" class="btn btn-secondary ml-2" onclick="location.href='index.php?axn=InicioAdmin';">Volver</button>
        </div>
        </form>
      </div>
    </div>
  </div>

</body>

</html>
