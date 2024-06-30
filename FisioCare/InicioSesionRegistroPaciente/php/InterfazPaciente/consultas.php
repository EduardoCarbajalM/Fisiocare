<?php
// Se utiliza para llamar al archivo que contine la conexion a la base de datos
require 'conexion.php';

// Consulta para obtener datos de la tabla usuarios
$sql = "SELECT NombreCompleto FROM usuarios";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Mostrar los nombres de los pacientes en el select
    while ($row = $result->fetch_assoc()) {
        echo "<option value='" . $row['NombreCompleto'] . "'>" . $row['NombreCompleto'] . "</option>";
    }
} else {
    echo "<option value=''>No hay pacientes disponibles</option>";
}

// Cerrar conexión a la base de datos
$conn->close();
?>
