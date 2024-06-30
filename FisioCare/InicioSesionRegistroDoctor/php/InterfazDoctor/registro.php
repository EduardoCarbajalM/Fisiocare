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

// Verificar si se ha enviado el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener los datos del formulario
    $nombre_user = $_POST["usuario"];
    $correo_paciente = $_POST["correo_paciente"];
    $fecha_inicio = $_POST["fecha_inicio"];
    $fecha_siguiente = $_POST["fecha_siguiente_cita"];
    $datos_tratamiento = $_POST["datos_tratamiento"];
    $realizado = ($_POST["realizado"] == 'si') ? 1 : 0; // Convertir el valor 'si' o 'no' a booleano

    // Consulta para obtener el id_user correspondiente al correo del paciente
    $consulta_id_user = "SELECT id_user FROM usuarios WHERE correo_user = '$correo_paciente'";
    $resultado_id_user = mysqli_query($conexion, $consulta_id_user);

    if ($resultado_id_user && mysqli_num_rows($resultado_id_user) > 0) {
        $fila = mysqli_fetch_assoc($resultado_id_user);
        $id_user = $fila['id_user'];

        // Consulta para actualizar los datos en la tabla 'usuarios' para el id_user correspondiente
        $update_query = "UPDATE usuarios SET fecha_inicio = '$fecha_inicio', fecha_siguiente = '$fecha_siguiente', datos_tratamiento = '$datos_tratamiento', realizado = $realizado WHERE id_user = $id_user";

        if (mysqli_query($conexion, $update_query)) {
            echo "Datos actualizados correctamente en la tabla 'usuarios'.";
        } else {
            echo "Error al actualizar datos: " . mysqli_error($conexion);
        }
    } else {
        echo "No se encontró ningún usuario con el correo proporcionado.";
    }
}

// Consulta para obtener datos de la tabla usuarios
$sql = "SELECT nombre_user, correo_user FROM usuarios";
$result = $conexion->query($sql);

$options = "";

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $options .= "<option value='" . $row['nombre_user'] . "' data-correo='" . $row['correo_user'] . "'>" . $row['nombre_user'] . "</option>";
    }
} else {
    $options .= "<option value=''>No hay pacientes disponibles</option>";
}

// Cerramos la conexión a la base de datos
$conexion->close();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width">
    <title>Registrar Tratamiento</title>
    <link rel="stylesheet" href="reset.css">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="seguir_tratamiento.html">
    <script src="minimenu.js"></script>
    <script>
        // Función para actualizar el correo electrónico al seleccionar un usuario en el menú desplegable
        function actualizarCorreo() {
            var select = document.getElementById("id_user");
            var correoInput = document.getElementById("correo_paciente");

            var selectedOption = select.options[select.selectedIndex];
            correoInput.value = selectedOption.getAttribute("data-correo");
        }
    </script>
</head>
<body>
<header>
    <div class="caja">
        <ul>
            <li><img src="Imagenes/LOGO.png" alt="Logo"></li>
        </ul>
        <ul>
            <li><img src="Imagenes/Doctor.png" alt="Cuenta" id="perfil">
                <div class="menu_Cuenta">
                    <ul>
                        <li><a href="micuenta.html">Mi cuenta</a></li>
                    </ul>
                </div>
            </li>
        </ul>
    </div>
</header>

<main>
    <nav class="menu_registro">
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
            <div class="opciones">
                <p>Seleccione al paciente</p>
                <select name="usuario" id="id_user" onchange="actualizarCorreo()">
                    <?php echo $options; ?> <!-- Las opciones serán llenadas por PHP -->
                </select>
            </div>

            <div class="fecha_cita">
                <p>Fecha de inicio</p>
                <input type="date" name="fecha_inicio">
            </div>

            <div class="correo_paciente">
                <p>Correo del paciente</p>
                <input type="email" name="correo_paciente" id="correo_paciente" placeholder="email@gmail.com">
            </div>

            <div class="fecha_siguiente_cita">
                <p>Fecha de la siguiente cita</p>
                <input type="date" name="fecha_siguiente_cita">
            </div>

            <div class="datos_tratamiento">
                <p>Datos del tratamiento</p>
                <textarea cols="40" rows="6" name="datos_tratamiento"></textarea>
            </div>

            <div class="confirmar_tratamiento">
                <p>¿Se realizó el tratamiento?</p>
                <button type="submit" name="realizado" value="si">Sí</button>
                <button type="submit" name="realizado" value="no">No</button>
            </div>
        </form>
    </nav>
</main>
</body>
</html>
