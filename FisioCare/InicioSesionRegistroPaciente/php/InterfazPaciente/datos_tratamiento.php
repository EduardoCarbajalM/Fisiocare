<?php
// Definimos las credenciales de la base de datos
$servidor = "localhost"; // servidor de la base de datos
$usuario = "root"; // usuario de la base de datos
$contraseña = ""; // contraseña de la base de datos
$base_de_datos = "iniciosesionpaciente"; // nombre de la base de datos

// Creamos la conexión a la base de datos utilizando la función mysqli_connect
$conexion = mysqli_connect($servidor, $usuario, $contraseña, $base_de_datos);

// Verificamos si la conexión fue exitosa
if (!$conexion) {
    die("Conexión fallida: " . mysqli_connect_error()); // Si la conexión falla, se muestra un mensaje de error y se termina la ejecución del script
}

// Obtenemos el nombre de usuario enviado por la petición GET
$nombreUsuario = $_GET['nombre_usuario'];

// Consulta para obtener la fecha de inicio correspondiente al nombre de usuario
$consulta_datos_tratamiento = "SELECT datos_tratamiento FROM usuarios WHERE nombre_user = '$nombreUsuario'";
$resultado_datos_tratamiento = mysqli_query($conexion, $consulta_datos_tratamiento);

if ($resultado_datos_tratamiento && mysqli_num_rows($resultado_datos_tratamiento) > 0) {
    $fila = mysqli_fetch_assoc($resultado_datos_tratamiento);
    $datosTratamiento = $fila['datos_tratamiento'];
    echo "" . $datosTratamiento; // Aquí devolvemos el dato de fecha_inicio
} else {
    echo "No se encontró la fecha siguiente para el usuario proporcionado.";
}

// Cerramos la conexión a la base de datos
mysqli_close($conexion);
?>
