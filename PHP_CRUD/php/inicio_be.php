<?php
    include 'conexion_be.php';
    $sql = "SELECT * FROM usuario";
    if ($result = mysqli_query($conexion, $sql)) {
        $verificar_cantidad_usu = mysqli_num_rows($result);
    }

    $sql1 = "SELECT * FROM rol";
    if ($result1 = mysqli_query($conexion, $sql1)) {
        $verificar_cantidad_roles = mysqli_num_rows($result1);
    }
?>