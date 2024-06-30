<?php
    // Se hace la conexión a la base de datos
    require 'conexion.php';

    // Consulta para obtener los datos de la tabla 'usuarios'
    $query = "SELECT nombre_user, correo_user FROM usuarios";
    $result = mysqli_query($conexion, $query);

    // Verifica si hay resultados y muestra los datos en un contenedor cuadrado
    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        echo '<div class="container-cuadrado">';
        echo '  <input type="text" class="input-nombre" value="' . $row['nombre_user'] . '" placeholder="Nombre de usuario" disabled>';
        echo '  <input type="text" class="input-correo" value="' . $row['correo_user'] . '" placeholder="Correo electrónico" disabled>';
        echo '</div>';
    } else {
        echo "No se encontraron datos.";
    }

    // Cierra la conexión a la base de datos
    mysqli_close($conexion);
?>

