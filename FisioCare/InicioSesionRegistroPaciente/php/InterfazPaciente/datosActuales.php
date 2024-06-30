<?php
// datosActuales.php

$conexion = new mysqli("tu_servidor", "tu_usuario", "tu_contrasena", "tu_base_de_datos");

if ($conexion->connect_error) {
    die("Conexión fallida: " . $conexion->connect_error);
}

$nombreUsuario = $_GET['nombre_user'] ?? '';

$sql = "SELECT nombre_user, contrasena_user, correo_user FROM iniciosesionpaciente.usuarios WHERE nombre_user = '$nombreUsuario'";
$resultado = $conexion->query($sql);

if ($resultado->num_rows > 0) {
    $fila = $resultado->fetch_assoc();
    $nombreUserBD = $fila['nombre_user'];
    $contrasenaUserBD = $fila['contrasena_user'];
    $correoUserBD = $fila['correo_user'];
} else {
    die("Usuario no encontrado");
}

$conexion->close();

// Devolver los datos como JSON
echo json_encode([
    'nombre_user' => $nombreUserBD,
    'contrasena_user' => $contrasenaUserBD,
    'correo_user' => $correoUserBD,
]);
?>
