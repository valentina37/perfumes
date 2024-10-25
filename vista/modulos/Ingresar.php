<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ingreso</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f8f9fa;
        }

        .form-container {
            max-width: 400px;
            margin: 50px auto;
            padding: 20px;
            background-color: #171717;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .form-container:hover {
            transform: scale(1.05);
            transition: transform 0.3s ease-in-out;
        }

        .form-heading {
            text-align: center;
            margin-bottom: 20px;
            color: white;
        }

        .form-group .input-icon {
            height: 1.3em;
            width: 1.3em;
            fill: white;
        }

        .form-group .input-field {
            background: none;
            border: none;
            outline: none;
            width: 100%;
            color: #d3d3d3;
        }

        .btn-custom {
            background-color: #252525;
            color: white;
            transition: background-color 0.3s ease-in-out;
        }

        .btn-custom:hover {
            background-color: black;
            color: white;
        }

        .forgot-password,
        .sign-up {
            color: #d3d3d3;
        }

        .forgot-password:hover,
        .sign-up:hover {
            color: white;
            text-decoration: underline;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="form-container">
            <h2 class="form-heading">Ingreso</h2>
            <form method="POST">
                <div class="form-group">
                    <label class="sr-only">Correo electrónico</label>
                    <div class="input-group">
                        <input type="email" class="form-control bg-dark border-dark input-field" id="correoElectronico" name="correoElectronico" placeholder="Ingrese su correo electrónico" required>
                    </div>
                </div>
                <div class="form-group">
                    <label class="sr-only">Contraseña</label>
                    <div class="input-group">
                        <input type="password" class="form-control bg-dark border-dark input-field" id="contrasena" name="contrasena" placeholder="Ingrese su contraseña" required>
                        <?php
                        if ($_SERVER["REQUEST_METHOD"] == "POST") {
                            $ingreso = new ctrlformulario();
                            $ingreso->ctrlingreso();
                        }
                        ?>
                    </div>
                </div>
                <button type="submit" class="btn btn-custom btn-block">Login</button>
                <div class="text-center mt-3">
                    <a href="forgotPassword.php" class="forgot-password">¿Perdiste tu contraseña?</a><br>
                    <a href="index.php?axn=Registro" class="sign-up">¿No tienes cuenta? Regístrate</a>
                </div>
            </form>
        </div>
    </div>

    <!-- Bootstrap JS y dependencias -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
