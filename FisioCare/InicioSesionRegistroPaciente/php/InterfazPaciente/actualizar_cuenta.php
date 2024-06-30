<?php
require 'conexion.php';

// Verifica si se ha enviado información por POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtiene los datos del POST
    $nuevoNombreUsuario = $_POST['nombre_usuario'];
    $nuevaContrasena = $_POST['contrasena']; // Se asume que recibes la contraseña, asegúrate de manejar la seguridad correctamente
    $nuevoCorreo = $_POST['correo'];

    // Actualiza la información en la base de datos
    $sql = "UPDATE usuarios SET nombre_user = '$nuevoNombreUsuario', contrasena_user = '$nuevaContrasena', correo_user = '$nuevoCorreo' WHERE nombre_user = '$nuevoNombreUsuario'";

    if (mysqli_query($conexion, $sql)) {
        // Devuelve una respuesta JSON indicando éxito
        echo json_encode(['status' => 'success', 'message' => 'Cuenta actualizada exitosamente.']);
    } else {
        // Devuelve una respuesta JSON indicando error
        echo json_encode(['status' => 'error', 'message' => 'Error al actualizar la cuenta: ' . mysqli_error($conexion)]);
    }
} else {
    // Devuelve una respuesta JSON indicando error si no se recibieron datos por POST
    echo json_encode(['status' => 'error', 'message' => 'No se recibieron datos por POST.']);
}
?>
