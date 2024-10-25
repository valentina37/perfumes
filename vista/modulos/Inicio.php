<!-- vista/modulos/Inicio.php -->
<!DOCTYPE html>
<html lang="es"> 
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Bienvenido a Vivero Ortega Martínez</title>
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
        <h1 class="text-lg">Bienvenido a Vivero Ortega Martínez</h1>
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

  <div id="inicio-carousel" class="carousel slide" data-ride="carousel">
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img src="img/Logotipo2.png" class="d-block w-100" alt="Logotipo">
      </div>
      <div class="carousel-item">
        <img src="img/Logotipo2.png" class="d-block w-100" alt="Logotipo">
        <div class="carousel-caption d-none d-md-block">
        </div>
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
</body>
</html>