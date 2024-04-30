<?php
// Definir las constantes de la base de datos
define('DB_HOST', 'localhost'); // Host de la base de datos
define('DB_USER', 'root');      // Usuario de la base de datos
define('DB_PASS', '');          // Contraseña de la base de datos
define('DB_NAME', 'BazarTec');  // Nombre de la base de datos

// Intentar conectar a la base de datos
$conexion = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

// Verificar si hay errores de conexión
if ($conexion->connect_error) {
    die("Error al conectar a la base de datos: " . $conexion->connect_error);
}

echo "Conexión exitosa a la base de datos!";
?>
