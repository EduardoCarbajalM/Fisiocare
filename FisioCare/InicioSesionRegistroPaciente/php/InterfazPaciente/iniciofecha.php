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
$consulta_fecha_inicio = "SELECT fecha_inicio FROM usuarios WHERE nombre_user = '$nombreUsuario'";
$resultado_fecha_inicio = mysqli_query($conexion, $consulta_fecha_inicio);

if ($resultado_fecha_inicio && mysqli_num_rows($resultado_fecha_inicio) > 0) {
    $fila = mysqli_fetch_assoc($resultado_fecha_inicio);
    $fechaInicio = $fila['fecha_inicio'];
    echo "Fecha de inicio: " . $fechaInicio; // Aquí devolvemos el dato de fecha_inicio
} else {
    echo "No se encontró la fecha de inicio para el usuario proporcionado.";
}

// Cerramos la conexión a la base de datos
mysqli_close($conexion);
?>
