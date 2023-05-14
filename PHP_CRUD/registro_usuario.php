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

            <!--Registro-->
            <form action="php/registro_usuario_be.php" method="POST" enctype="multipart/form-data" class="formulario__register">
                <h1>Registro de usuarios</h1><br>
                <input class="caja_texto" type="text" placeholder="Nombre" name="nombre" required maxlength="50"><br>

                <input class="caja_texto" type="text" placeholder="Apellido" name="apellido" required maxlength="50"><br>

                <input class="caja_texto" type="number" placeholder="Edad" name="edad" required maxlength="3"><br>

                <select class="caja_texto" name="tipo_doc" required>
                    <option value="">Tipo de documento</option>
                    <option value="Cedula">Cedula</option>
                    <option value="NIT">NIT</option>
                    <option value="RUC">RUC</option>
                </select><br>

                <input class="caja_texto" type="number" placeholder="Documento" name="documento" required maxlength="20"><br>

                <select class="caja_texto" name="cod_Rol" required>
                    <option value="">Selecciona un rol</option>
                    <?php
                    // Realizar la consulta
                    $query = "SELECT cod_Rol, nombreRol FROM rol";
                    $result = mysqli_query($conexion, $query);

                    // Recorrer los resultados y mostrarlos en la lista desplegable
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo '<option value="' . $row['cod_Rol'] . '">' . $row['cod_Rol'] . '</option>';
                    }

                    // Cerrar la conexión a la base de datos
                    mysqli_close($conexion);
                    ?>
                </select><br>

                <label for="foto">Foto:</label><br>
                <input type="file" name="foto" required accept="image/*"><br><br>

                <button>
                    <div class="button_registrar">
                        <i class="fa-solid fa-check"></i>
                        <h4>Registrar</h4>
                    </div>
                </button>
            </form>
        </center>
    </main>
</body>

</html>
<?php include("pie.php"); ?>