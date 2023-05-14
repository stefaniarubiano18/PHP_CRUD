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
            </button>
        </center>
    </main>
</body>

</html>

<?php
    $resultado2 = mysqli_query($conexion, "SELECT u.nombre, u.apellido, u.edad, u.foto, u.tipo_doc, u.documento, u.cod_Rol, r.nombreRol FROM rol r INNER JOIN usuario u ON u.cod_Rol = r.cod_Rol;");
        echo "<center>
                <table width='1200' border='4'>
                    <tr>
                        <th><center>Nombre</center></th>
                        <th><center>Apellido</center></th>
                        <th><center>Edad</center></th>
                        <th><center>Foto</center></th>
                        <th><center>Tipo de documento</center></th>
                        <th><center>Documento</center></th>
                        <th><center>Código del Rol</center></th>
                        <th><center>Rol</center></th>
                    </tr>";

                    while ($consulta2 = mysqli_fetch_array($resultado2)) {
                        echo "
                        <tr>
                            <td style='text-align: center;'>" . $consulta2['nombre'] . "</td>
                            <td style='text-align: center;'>" . $consulta2['apellido'] . "</td>
                            <td style='text-align: center;'>" . $consulta2['edad'] . "</td>
                            <td style='text-align: center;'><img src='" . $consulta2['foto'] . "' width='100'></td>
                            <td style='text-align: center;'>" . $consulta2['tipo_doc'] . "</td>
                            <td style='text-align: center;'>" . $consulta2['documento'] . "</td>
                            <td style='text-align: center;'>" . $consulta2['cod_Rol'] . "</td>
                            <td style='text-align: center;'>" . $consulta2['nombreRol'] . "</td>
                        </tr>";
                        }
                        echo "</table>
                            </center>";
                    mysqli_close($conexion);
            ?>