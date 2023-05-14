<?php

    include 'conexion_be.php';

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
    if ($foto_nombre != '') {

        // Verificar si el archivo es una imagen
        if (!preg_match('/^image\/(jpeg|jpg|png|gif)$/', $foto_tipo)) {
            echo '
                    <script>
                        alert("El archivo debe ser una imagen");
                        window.location = "../registro_usuario.php";
                    </script>
                ';
            exit();
        }
        
        // Generar un nombre único para la imagen
        $foto_nombre_uniq = uniqid('', true) . '.' . pathinfo($foto_nombre, PATHINFO_EXTENSION);

        // Mover la imagen al directorio de imágenes
        $foto_ruta = $foto_nombre_uniq;
        move_uploaded_file($foto_temp, '../' . $foto_ruta);
    } else {
        $foto_ruta = '';
    }

    $query = "INSERT INTO usuario(nombre, apellido, edad, foto, tipo_doc, documento, cod_Rol) 
                VALUES('$nombre','$apellido','$edad','$foto_ruta','$tipo_doc','$documento','$cod_Rol')";

    //Verificar documento
    $verificar_documento = mysqli_query($conexion, "SELECT * FROM usuario WHERE documento='$documento'");

    if (mysqli_num_rows($verificar_documento) > 0) {
        echo '
                    <script>
                        alert("Este documento ya se encuentra registrado");
                        window.location = "../usuario.php";
                    </script>
                ';
        exit();
    }

    $ejecutar = mysqli_query($conexion, $query);

    if ($ejecutar) {
        echo '
                <script>
                    alert("Usuario creado exitosamente");
                    window.location = "../usuario.php";
                </script>
            ';
    } else {
        echo '
                <script>
                    alert("El usuario no pudo ser creado");
                    window.location = "../registro_usuario.php";
                </script>
            ';
    }
?>
