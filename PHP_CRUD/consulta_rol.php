<?php
include("cabecera.php");
include("php/conexion_be.php");
?>
<!DOCTYPE html>
<html lang="en">

<body>

    <head>
        <title>Roles</title>
        <link href="https://cdn.lineicons.com/3.0/lineicons.css" rel="stylesheet">
        <link rel="stylesheet" href="assets/css/estilo_usuario.css">
    </head>

    <main>
        <center>
            <!--Consulta-->
            <form method="POST">
                <h1>Consultar roles</h1><br>
                <img src="assets/images/Rol.jpg" alt="imagen-de-consulta-roles" width="50%" height="50%"><br>
                <input type="submit" value="Clic aqui" class="fa-solid fa-eye" name="Consultar_rol"><br>
                <div class="fa-solid fa-eye">
            </form><br>

            <?php
                if (isset($_POST['Consultar_rol'])) {
                    $resultado2 = mysqli_query($conexion, "SELECT * FROM rol");
                    echo "
                        <center>
                        <table width='1200' border='4'>
                            <tr>
                                <th><center>Código del Rol</center></th>
                                <th><center>Rol</center></th>
                            </tr>";
                                while ($consulta3 = mysqli_fetch_array($resultado2)) {
                                    echo "
                                    <tr>
                                        <td>" . $consulta3['cod_Rol'] . "</td>
                                        <td>" . $consulta3['nombreRol'] . "</td>
                                    </tr>";
                                }
                                echo "
                                    </table>
                                    </center>";
                    mysqli_close($conexion);
                }
            ?>
        </center>
    </main>
</body>

</html>