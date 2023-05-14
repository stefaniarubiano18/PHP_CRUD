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

            <!--Actualizacion-->
            <form method="POST" enctype="multipart/form-data">

                <h1>Actualizacion de usuarios</h1><br>

                <input class="caja_texto" type="number" placeholder="Documento" name="documento" required maxlength="20">

                <input type="submit" value="Buscar" class="fa-solid fa-circle-check" name="Buscar_usuario">
                <div class="fa-solid fa-circle-check"></div><br>

                <?php
                if (isset($_POST['Buscar_usuario'])) {
                    $documento = $_POST['documento'];
                    $resultado1 = mysqli_query($conexion, "SELECT * FROM usuario WHERE documento = $documento");

                    if (mysqli_num_rows($resultado1) == 0) {
                        echo '
                                <script>
                                    alert("El número de documento no existe");
                                    window.location = "actualizacion_usuario.php";
                                </script>
                            ';
                    } else {
                        while ($row = mysqli_fetch_assoc($resultado1)) { ?>
                            <input class="caja_texto" type="text" value="<?php echo $row["nombre"]; ?>" name="nombre" required maxlength="50"><br>

                            <input class="caja_texto" type="text" value="<?php echo $row["apellido"]; ?>" name="apellido" required maxlength="50"><br>

                            <input class="caja_texto" type="number" value="<?php echo $row["edad"]; ?>" name="edad" required maxlength="3"><br>

                            <select class="caja_texto" name="tipo_doc" required>
                                <option value="">Tipo de documento</option>
                                <option value="Cedula">Cedula</option>
                                <option value="NIT">NIT</option>
                                <option value="RUC">RUC</option>
                            </select><br>

                            <select class="caja_texto" value="<?php echo $row["cod_Rol"]; ?>" name="cod_Rol" required>
                                <option value="">Selecciona un rol</option>
                                <?php
                                // Realizar la consulta
                                $query = "SELECT cod_Rol, nombreRol FROM rol";
                                $result = mysqli_query($conexion, $query);

                                // Recorrer los resultados y mostrarlos en la lista desplegable
                                while ($row = mysqli_fetch_assoc($result)) {
                                    echo '<option value="' . $row['cod_Rol'] . '">' . $row['cod_Rol'] . '</option>';
                                }
                                ?>
                            </select><br>

                            <label for="foto">Foto:</label><br>
                            <input type="file" name="foto" required accept="image/*"><br><br>

                            <input type="submit" value="Actualizar" class="fa-solid fa-download" name="actualizar_usuario">
                            <div class="fa-solid fa-download"></div><br>
                <?php }
                    }
                }

                if (isset($_POST['actualizar_usuario'])) {

                    $nombre = $_POST['nombre'];
                    $apellido = $_POST['apellido'];
                    $edad = $_POST['edad'];
                    $tipo_doc = $_POST['tipo_doc'];
                    $documento = $_POST['documento'];
                    $cod_Rol = $_POST['cod_Rol'];

                    // Manejo de la imagen
                    $foto_nombre = $_FILES['foto']['name'];
                    $foto_tipo = $_FILES['foto']['type'];
                    $foto_tamano = $_FILES['foto']['size'];
                    $foto_temp = $_FILES['foto']['tmp_name'];
                    $foto_error = $_FILES['foto']['error'];

                    // Verificar si se subió una imagen
                    if (
                        $foto_nombre != ''
                    ) {

                        // Verificar si el archivo es una imagen
                        if (!preg_match('/^image\/(jpeg|jpg|png|gif)$/', $foto_tipo)) {
                            echo '
                                    <script>
                                        alert("El archivo debe ser una imagen");
                                        window.location = "actualizacion_usuario.php";
                                    </script>
                                ';
                            exit();
                        }

                        // Generar un nombre único para la imagen
                        $foto_nombre_uniq = uniqid('', true) . '.' . pathinfo($foto_nombre, PATHINFO_EXTENSION);

                        // Mover la imagen al directorio de imágenes
                        $foto_ruta = $foto_nombre_uniq;
                        move_uploaded_file($foto_temp, $foto_ruta);
                    } else {
                        $foto_ruta = '';
                    }


                    if ($nombre == "" || $apellido == "" || $edad == "" || $tipo_doc == "" || $documento == "" || $cod_Rol == "") {
                        echo "Los campos son obligatorios";
                    } else {
                        $existe = 0;

                        $resultado2 = mysqli_query($conexion, "SELECT * FROM usuario WHERE documento = '$documento'");

                        while ($consulta = mysqli_fetch_array($resultado2)) {
                            $existe++;
                        }
                        if ($existe == 0) {
                            echo '
                                            <script>
                                                alert("El número de documento no existe");
                                                window.location = "actualizacion_usuario.php";
                                            </script>
                                        ';
                        } else {
                            $_UPDATE_SQL = "UPDATE usuario set nombre='$nombre', apellido='$apellido', edad='$edad', foto='$foto_ruta', tipo_doc='$tipo_doc', cod_Rol='$cod_Rol' WHERE documento='$documento'";

                            if (mysqli_query($conexion, $_UPDATE_SQL)) {
                                echo '
                                            <script>
                                                alert("Usuario actualizado exitosamente");
                                                window.location = "consulta_usuario.php";
                                            </script>
                                        ';
                            } else {
                                echo '
                                            <script>
                                                alert("Error al actualizar el usuario ' . mysqli_error($conexion) . '");
                                            </script>
                                        ';
                            }
                        }
                    }
                }
                mysqli_close($conexion); ?>
        </center>
        </form>
    </main>
</body>

</html>