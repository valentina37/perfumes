<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Registro de nuevo Usuario</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/css/bootstrap.min.css">
</head>


<body>
  <div class="container">
    <h1 class="mt-5 mb-4 text-center">Registro de nuevo Usuario</h1>
    <div class="row">
      <div class="col-md-6">
        <form action="" method="POST">
          <div class="form-group">
            <label for="nombre">Nombre:</label>
            <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Ingrese sus nombres" required>
          </div>
          <div class="form-group">
            <label for="apellido">Apellido:</label>
            <input type="text" class="form-control" id="apellido" name="apellido" placeholder="Ingrese sus apellidos" required>
          </div>
          <div class="form-group">
            <label for="correo">Correo electrónico:</label>
            <input type="email" class="form-control" id="correo" name="correoElectronico" placeholder="Ingrese su correo" required>
          </div>
          <div class="form-group">
            <label for="clave">Clave:</label>
            <input type="password" class="form-control" id="contrasena" name="contrasena" placeholder="Ingrese su clave" required>
          </div>
      </div>
      <div class="col-md-6">
        <div class="form-group">
          <label for="direccion">Dirección:</label>
          <input type="text" class="form-control" id="direccion" name="direccion" placeholder="Ingrese su dirección" required>
        </div>
        <div class="form-group">
          <label for="telefono">Teléfono:</label>
          <input type="number" class="form-control" id="telefono" name="telefono" placeholder="Ingrese su teléfono" required>
        </div>
        <div class="form-check">
          <input type="checkbox" class="form-check-input" id="terminos" required>
          <label class="form-check-label" for="terminos">Estoy de acuerdo con <a href="#">términos y condiciones</a></label>
        </div>
        <div class="text-center mt-4">
          <button type="submit" class="btn btn-primary" name="submit">Crear Usuario</button>
          <button type="button" class="btn btn-secondary ml-2" onclick="location.href='index.php?axn=Inicio';">Volver</button>
        </div>
        <?php $registro = ctrlformulario::ctrlregistro();
        if ($registro == "recibido") {
          echo '<script>
            if (window.history.replaceState) {
              window.history.replaceState(null, null, window.location.href);
            }
            </script>';
          echo "<p class='text-success text-center mt-3'>El usuario ha sido registrado correctamente</p>";
        }

        ?>
        </form>
      </div>
    </div>
  </div>

</body>

</html>