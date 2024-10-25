<!-- vista/modulos/Eliminar.php -->
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


if (isset($_GET["idcliente"])) {
    $eliminar = ctrlformulario::ctrleliminarregistro();
    if ($eliminar == "OK") {
        echo '<script>
    alert("Los datos han sido eliminados exitosamente");
    window.location.href = "index.php?axn=InicioAdmin";
</script>';
        exit(); // Salir del script después de la redirección
    } else {
        echo '<script>
    alert("Hubo un error al eliminar los datos");
    window.location.href = "index.php?axn=InicioAdmin";
</script>';
        exit(); // Salir del script después de la redirección
    }
} else {
    echo '<script>
alert("No se proporcionó el idcliente para eliminar");
window.location.href = "index.php?axn=InicioAdmin";
</script>';
    exit(); // Salir del script después de la redirección
}

?>