<?php
include("cabecera.php");
include("php/conexion_be.php");
?>
<!DOCTYPE html>
<html lang="en">

<body>

    <head>
        <title>Usuarios</title>
        <link href="https://cdn.lineicons.com/3.0/lineicons.css" rel="stylesheet">
        <link rel="stylesheet" href="assets/css/estilo_usuario.css">
    </head>

    <main>
        <h1>Control de usuarios</h1><br>
        <center>
            <button>
                <a href="registro_usuario.php">
                    <div class="button_empleado">
                        <i class="fa-solid fa-user-plus" title="Registro"></i>
                        <h4>Registro</h4>
                    </div>
                </a>
            </button>

            <button>
                <a href="consulta_usuario.php">
                    <div class="button_empleado">
                        <i class="fa-solid fa-magnifying-glass" title="Consulta"></i>
                        <h4>Consulta</h4>
                    </div>
                </a>
            </button>

            <button>
                <a href="actualizacion_usuario.php">
                    <div class="button_empleado">
                        <i class="fa-solid fa-users-gear" title="Actualizar"></i>
                        <h4>Actualizar</h4>
                    </div>
                </a>
            </button>

            <button>
                <a href="eliminacion_usuario.php">
                    <div class="button_empleado">
                        <i class="fa-solid fa-user-slash" title="Eliminar"></i>
                        <h4>Eliminar</h4>
                    </div>
                </a>
            </button><br><br>

            <!--Eliminar-->
            <form method="POST">
                <h1>Eliminación de usuarios</h1><br>
                <h4>Ingrese el número de documento del usuario a eliminar</h4><br>
                <input class="caja_texto" type="number" placeholder="Documento" name="documento" required maxlength="20">
                <input onclick="eliminar()" type="submit" value="Eliminar" class="fa-solid fa-ban" name="Eliminar_usuario">
                <div class="fa-solid fa-ban"></div><br>
            </form>
        </center>
    </main>
</body>

</html>

<?php
if (isset($_POST['Eliminar_usuario'])) {
    $documento = $_POST['documento'];
    $query = mysqli_query($conexion, "DELETE FROM usuario WHERE documento = $documento");
    if (mysqli_affected_rows($conexion) > 0) {
        echo '
            <script>
                alert("Usuario eliminado exitosamente");
                window.location = "consulta_usuario.php";
            </script>
        ';
    } else {
        echo '
            <script>
                alert("No se puede eliminar un usuario que no existe");
            </script>
        ';
    }
}
mysqli_close($conexion);
?>