  <!-- control/formularios.php -->
  <?php
  class ctrlformulario
  //la clase tiene una función publica que llame a la plantilla
  {
    static public function ctrlregistro()
    {
      if (isset($_POST["nombre"])) {
        $correoExistente = modeloformularios::mdlseleccionRegistros("cliente", "correoElectronico", $_POST["correoElectronico"]);
        if ($correoExistente) {
            echo '<script>
                if (window.history.replaceState) {
                    window.history.replaceState(null, null, window.location.href);
                }
                alert("El correo electrónico ingresado ya está registrado");
            </script>';
        } else {
          // El correo electrónico no está registrado, proceder con el registro
          $tabla = "cliente";
          // los datos van en un array con propiedades
          // las propiedades son los títulos  de los campos
          $datos = array(
            // escriba un array es una pregunta del parcial  
            "nombre" => $_POST["nombre"],
            "apellido" => $_POST["apellido"],
            "correoElectronico" => $_POST["correoElectronico"],
            "contrasena" => $_POST["contrasena"],
            "direccion" => $_POST["direccion"],
            "telefono" => $_POST["telefono"]
          );
          $respuesta = modeloformularios::mdlregistro($tabla, $datos);
          if ($respuesta == "recibido") {
              echo '<script>
                  if (window.history.replaceState) {
                      window.history.replaceState(null, null, window.location.href);
                  }
                  </script>';
              echo "<p class='text-success text-center mt-3'>El usuario ha sido registrado correctamente</p>";
          }
      }
  }
}


    static public function ctrlseleccionRegistros($item, $valor)
    {
      $tabla = "cliente";
      $respuesta = modeloformularios::mdlseleccionRegistros($tabla, $item, $valor);
      //      echo "Respuesta de la selección de registros: "; // Mensaje de depuración
      //      var_dump($respuesta); // Mensaje de depuración
      return $respuesta;
    }
    static public function ctrlingreso()
    {
      if (isset($_POST["correoElectronico"]) && isset($_POST["contrasena"])) {
        $correo = $_POST["correoElectronico"];
        $contrasena = $_POST["contrasena"];

        // Mensajes de depuración
        //        echo "Correo ingresado: $correo <br>";
        //        echo "Contraseña ingresada: $contrasena <br>";

        $tabla = "cliente";
        $respuesta = modeloformularios::mdlseleccionRegistros($tabla, "correoElectronico", $correo);

        // Mensaje de depuración
        //        echo "Respuesta de la selección de registros: ";
        //        var_dump($respuesta);

        if (!$respuesta) {
          // Correo electrónico no encontrado en la base de datos
          echo '<script>
                if(window.history.replaceState) {
                    window.history.replaceState(null,null,window.location.href);
                }
                alert("El correo electrónico no está registrado en la base de datos");
            </script>';
        } elseif ($respuesta["contrasena"] == $contrasena) {
          // Inicio de sesión exitoso
          $_SESSION["validarIngreso"] = "OK";
          $_SESSION["nombre"] = $respuesta["nombre"]; // Almacena el nombre del usuario en la sesión
          $_SESSION["apellido"] = $respuesta["apellido"]; // Almacena el apellido del usuario en la sesión
    // Redirigir a la página de inicio
          echo '<script>
                if(window.history.replaceState) {
                    window.history.replaceState(null,null,window.location.href);
                }
                window.location= "index.php?axn=InicioAdmin"
              </script>';
      }
       else {
          // Contraseña incorrecta
          $correosRegistrados = implode(', ', array_column($respuesta, 'correoElectronico'));
          echo '<script>
                if(window.history.replaceState) {
                    window.history.replaceState(null,null,window.location.href);
                }
                alert("La contraseña ingresada no es válida. Los correos registrados son: ' . $correosRegistrados . '");
            </script>';
        }
      }
    }

    static public function ctrlactualizarregistro()
    {
        if (isset($_POST["EditarNombre"])) {
            $idcliente = $_POST["idcliente"];
            $nombre = $_POST["EditarNombre"];
            $apellido = $_POST["EditarApellido"];
            $correoElectronico = $_POST["EditarCorreoElectronico"];
            $contrasena = ($_POST["EditarContrasena"] != "") ? $_POST["EditarContrasena"] : $_POST["ContrasenaActual"];
            $direccion = $_POST["EditarDireccion"];
            $telefono = $_POST["EditarTelefono"];
    
            // Verificar si el correo electrónico ha cambiado
            $registroActual = ctrlformulario::ctrlseleccionRegistros("idcliente", $idcliente);
            if ($registroActual && $registroActual["correoElectronico"] != $correoElectronico) {
                // El correo electrónico ha cambiado, verificar si ya está en uso
                $correoExistente = modeloformularios::mdlseleccionRegistros("cliente", "correoElectronico", $correoElectronico);
                if ($correoExistente && $correoExistente["idcliente"] != $idcliente) {
                    // El nuevo correo electrónico ya está en uso por otro usuario
                    echo '<script>alert("El correo electrónico ingresado ya está registrado por otro usuario.");</script>';
                    return;
                }
            }
    
            // Los datos son válidos, proceder con la actualización
            $tabla = "cliente";
            $datos = array(
                "idcliente" => $idcliente,
                "nombre" => $nombre,
                "apellido" => $apellido,
                "correoElectronico" => $correoElectronico,
                "contrasena" => $contrasena,
                "direccion" => $direccion,
                "telefono" => $telefono
            );
            $respuesta = modeloformularios::mdlactualizarregistro($tabla, $datos);
            return $respuesta;
        }
    }
    

    static public function ctrleliminarregistro()
    {
      if (isset($_GET["idcliente"])) {
        $tabla = "cliente";
        $datos = $_GET["idcliente"];
        $respuesta = modeloformularios::mdleliminarregistro($tabla, $datos);

        if ($respuesta == "OK") {
          echo '<script>
                    alert("El cliente ha sido eliminado exitosamente");
                    window.location = "index.php?axn=InicioAdmin";
                </script>';
        } else {
          echo '<script>
                    alert("Hubo un error al eliminar el cliente");
                </script>';
        }
      }
    }

    //static public function ctrlaregistro()
    // {
    // if (isset($_POST["EditarNombre"])) {

  }

  ?>