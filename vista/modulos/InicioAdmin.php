<!-- vista/modulos/InicioAdmin.php -->
<?php
if (!isset($_SESSION["validarIngreso"]) || $_SESSION["validarIngreso"] != "OK") {
  // Si no está autenticado, redirigir a la página de inicio de sesión
  header("Location: index.php?axn=Ingresar");
  exit();
}
// Obtener el nombre y apellido del usuario de la sesión
$nombreUsuario = isset($_SESSION["nombre"]) ? $_SESSION["nombre"] : "";
$apellidoUsuario = isset($_SESSION["apellido"]) ? $_SESSION["apellido"] : "";

// Concatenar nombre y apellido para el saludo
$nombreCompleto = $nombreUsuario . " " . $apellidoUsuario;
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bienvenido <?php echo $nombreCompleto; ?> a Vivero Ortega Martínez</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
</head>
<body>
  <div class="welcome-container">
    <div class="row">
      <div class="col-md-2">
        <img src="img/Trinitari.jpg" alt="Imagen Izquierda" class="img-fluid img-thumbnail">
      </div>
      <div class="col-md-8">
      <h1>Bienvenido <?php echo $nombreCompleto; ?> a Vivero Ortega Martínez</h1>
        <p class="lead text-lg">Sembramos Oportunidades, Nutrición, Riqueza botánica,
          Innovamos, para una mejor agricultura. Especialistas en Sostenibilidad.
          ¡S.O.N.R.I.E. con nosotros!</p>
      </div>
      <div class="col-md-2">
        <img src="img/Hortenci.jpg" alt="Imagen Derecha" class="img-fluid img-thumbnail">
      </div>
    </div>
  </div>
  <section class="bg-darkgreen text-light text-center py-5">
    <div class="container">
      <h2 class="section-title">Descubre lo que ofrecemos</h2>
      <div class="row">
        <div class="col-md-4">
          <a href="index.php?axn=Servicios#plantas">
            <img src="img/bonsai.jpg" alt="Plantas Destacadas" class="img-fluid img-thumbnail">
          </a>
          <h3>Plantas de Alta Calidad</h3>
          <p>Descubre nuestra amplia variedad de plantas de alta calidad.</p>
        </div>
        <div class="col-md-4">
          <a href="index.php?axn=Servicios#semillas">
            <img src="img/Semillas.jpg" alt="Semillas Destacadas" class="img-fluid img-thumbnail">
          </a>
          <h3>Semillas Especializadas</h3>
          <p>Explora nuestras semillas especializadas para cultivar tus propios alimentos.</p>
        </div>
        <div class="col-md-4">
          <a href="index.php?axn=Servicios#servicios-personalizados">
            <img src="img/cultivo.jpg" alt="Servicios Destacados" class="img-fluid img-thumbnail">
          </a>
          <h3>Servicios Personalizados</h3>
          <p>Conoce nuestros servicios diseñados para satisfacer tus necesidades de jardinería.</p>
        </div>
      </div>
    </div>
  </section>

  <div class="container">
    <h1 class="mt-5 mb-4 text-center">Tabla de Clientes</h1>
    <table class="table table-striped">
      <thead>
        <tr>
          <th>Id</th>
          <th>Nombre</th>
          <th>Apellido</th>
          <th>Correo Electrónico</th>
          <th>Dirección</th>
          <th>Teléfono</th>
          <th>Fecha</th>
          <th>Acciones</th>
        </tr>
      </thead>
      <tbody>
        <?php
        $usuarios = ctrlformulario::ctrlseleccionRegistros(null, null);
        foreach ($usuarios as $usuario) {
          echo "<tr>";
          echo "<td>" . htmlspecialchars($usuario["idcliente"]) . "</td>";
          echo "<td>" . htmlspecialchars($usuario["nombre"]) . "</td>";
          echo "<td>" . htmlspecialchars($usuario["apellido"]) . "</td>";
          echo "<td>" . htmlspecialchars($usuario["correoElectronico"]) . "</td>";
          echo "<td>" . htmlspecialchars($usuario["direccion"]) . "</td>";
          echo "<td>" . htmlspecialchars($usuario["telefono"]) . "</td>";
          echo "<td>" . htmlspecialchars($usuario["fecha"]) . "</td>";
          echo "<td>
                  <a href='index.php?axn=Eliminar&idcliente=" . $usuario["idcliente"] . "' class='btn btn-danger' onclick='return confirm(\"¿Estás seguro de que deseas eliminar este cliente?\")'>Eliminar</a>
                  <a href='index.php?axn=Editar&idcliente=" . htmlspecialchars($usuario["idcliente"]) . "' class='btn btn-secondary btn-sm'>Editar</a>
                </td>";
          echo "</tr>";
        }
        ?>
      </tbody>
    </table>
  </div>

  <div id="inicio-carousel" class="carousel slide" data-ride="carousel">
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img src="img/Logotipo2.png" class="d-block w-100" alt="Logotipo">
      </div>
      <div class="carousel-item">
        <img src="img/Logotipo2.png" class="d-block w-100" alt="Logotipo">
      </div>
    </div>
    <a class="carousel-control-prev" href="#inicio-carousel" role="button" data-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="sr-only">Anterior</span>
    </a>
    <a class="carousel-control-next" href="#inicio-carousel" role="button" data-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="sr-only">Siguiente</span>
    </a>
    <a class="btn btn-outline-success btn-ingresar" href="index.php?axn=Ingresar" role="button">Saber más</a>
  </div>

  <!-- Scripts -->
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
