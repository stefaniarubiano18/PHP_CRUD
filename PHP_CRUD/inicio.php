<?php
include("cabecera.php");
include("php/inicio_be.php");
?>
<!DOCTYPE html>
<html lang="en">

<body>

    <head>
        <title>Sistema de control de usuarios</title>
        <link href="https://cdn.lineicons.com/3.0/lineicons.css" rel="stylesheet">
        <link rel="stylesheet" href="assets/css/estilo_inicio.css">
    </head>

    <main>
        <h1>Sistema de control de usuarios</h1>

        <div class="container__box">

            <div class="box">
                <i class="fa-solid fa-users"></i>
                <h5>Usuarios</h5>
                <h4>
                    <?php
                    echo ("Cantidad usuarios: $verificar_cantidad_usu");
                    ?>
                </h4>
            </div>


            <div class="box">
                <i class="fa-solid fa-award"></i>
                <h5>Roles</h5>
                <h4>
                    <?php
                    echo ("Cantidad roles: $verificar_cantidad_roles");
                    ?>
                </h4>
            </div>
        </div>
    </main>
</body>

</html>
<?php include("pie.php"); ?>