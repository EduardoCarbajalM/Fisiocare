<?php
// Se utiliza para llamar al archivo que contiene la conexión a la base de datos
require 'conexion.php';

// Validamos que el formulario y que el botón login haya sido presionado
if (isset($_POST['login'])) {

    // Obtener los valores enviados por el formulario
    $usuario = $_POST['nombre_user'];
    $contrasena = $_POST['contrasena_user'];

    // Ejecutamos la consulta a la base de datos utilizando la función mysqli_query
    $sql = "SELECT * FROM usuarios WHERE nombre_user = '$usuario' and contrasena_user = '$contrasena'";
    $resultado = mysqli_query($conexion, $sql);
    $numero_registros = mysqli_num_rows($resultado);

    if ($numero_registros != 0) {a
        // Obtenemos el correo del usuario
        $usuarioDatos = mysqli_fetch_assoc($resultado);
        $correo = $usuarioDatos['correo_user'];

        // Inicio de sesión exitoso, redirige a IndexTratamiento.html con los parámetros en la URL
        header("Location: InterfazPaciente/IndexTratamiento.html?nombre_user=$usuario&correo_user=$correo");
        exit();
    } else {
        // Credenciales inválidas
        echo "Credenciales inválidas. Por favor, verifica tu nombre de usuario y/o contraseña." . "<br>";
        echo "Error: " . $sql . "<br>" . mysqli_error($conexion);
    }
}
?>
