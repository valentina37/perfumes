<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Web Service</title>
  <link rel="stylesheet" href="/WEBMVC/style.css">
  <link type="image/png" sizes="32x32" rel="icon" href="img/icons.png">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/css/bootstrap.min.css">
</head>

<body style="background-color: #f5f5f5">
  <header class="bg-darkgreen text-light text-center py-3">
    <div class="container">
      <a class="navbar-brand" href="index.php?axn=Inicio">
        <img src="img/Logotipo1.png" alt="Logotipo Vivero Ortega Martínez" class="img-fluid" style="max-width: 100%;">
      </a>
    </div>
  </header>

  <?php
  session_start();

  // Incluye la barra de navegación según el estado de inicio de sesión
  if (isset($_SESSION["validarIngreso"])) {
    if ($_SESSION["validarIngreso"] == "OK") {
      include "modulos/NavegacionLogeado.php";
    } else {
      include "modulos/Navegacion.php";
    }
  } else {
    include "modulos/Navegacion.php";
  }
  ?>

  <section>
    <?php
    $mvc = new MvcController();
    $mvc->enlacespaginascontrol();
    ?>
  </section>

  <footer class="bg-dark text-light text-center py-3">
    <div class="container">
      <p>&copy; 2024 Vivero Ortega Martínez. Todos los derechos reservados.</p>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  </footer>
</body>

</html>
