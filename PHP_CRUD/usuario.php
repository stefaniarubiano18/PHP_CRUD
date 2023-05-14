<?php
include("cabecera.php");
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
                        <h4>Registrar</h4>
                    </div>
                </a>
            </button>

            <button>
                <a href="consulta_usuario.php">
                    <div class="button_empleado">
                        <i class="fa-solid fa-magnifying-glass" title="Consulta"></i>
                        <h4>Consultar</h4>
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
            <div class="contenedor__todo">
        </center>
    </main>
</body>

</html>
<?php include("pie.php"); ?>