<?php
// Conexión a la base de datos (asumiendo que ya has establecido la conexión)
require_once('conexionDB.php');

// Consulta para obtener los productos desde la base de datos
$query = "SELECT * FROM products";
$resultado = $conexion->query($query);

// Comprobar si hay resultados
if ($resultado->num_rows > 0) {
    // Array para almacenar los productos
    $productos = array();

    // Obtener los datos de los productos
    while ($row = $resultado->fetch_assoc()) {
        $productos[] = $row;
    }

    // Convertir el array a formato JSON
    echo json_encode($productos);
} else {
    echo "No se encontraron productos";
}

// Cerrar la conexión a la base de datos
$conexion->close();
?>
