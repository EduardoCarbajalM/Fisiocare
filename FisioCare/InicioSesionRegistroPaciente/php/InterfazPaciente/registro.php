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

// Consulta para obtener datos de la tabla usuarios
$sql = "SELECT nombre_user, correo_user FROM doctores";
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
            <form action="php/consultas.php" method="POST">
                <div class="opciones">
                    <h1>DATOS TRATAMIENTO</h1>
                    <p>Seleccione al doctor</p>
                    <select name="usuario" id="id_user" onchange="actualizarCorreo()">
                        <?php echo $options; ?> <!-- Las opciones serán llenadas por PHP -->
                    </select>
                </div>

                <div class="correo_paciente">
                    <p>Correo del doctor</p>
                    <input type="email" name="correo_paciente" id="correo_paciente" placeholder="email@gmail.com">
                </div>

                <div class="fecha_cita">
                    <p>Fecha de inicio</p>
                    <input type="date" name="fecha_inicio">
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
                      <form action="procesar_seleccion.php" method="POST">
                        <label for="si">Sí</label>
                        <input type="checkbox" id="si" name="opcion" value="si">

                        <label for="no">No</label>
                        <input type="checkbox" id="no" name="opcion" value="no">
        
         <!--<button type="submit">Enviar</button>-->
                 </form>
                </div>
            </form>
        </nav>
    </main>
</body>

</html>
