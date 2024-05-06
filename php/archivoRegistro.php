<?php
session_start();
if (isset($_POST['crearCliente'])) {
include 'conexionDB.php';
// Recoger los datos del formulario
$nombre = $_POST['nombree'];
$apellido = $_POST['apellido'];
$email = $_POST['email'];
$clave = $_POST['clave'];

// Verificar si ya existe un paciente con el mismo CURP
$check_sql = "SELECT * FROM clientes WHERE email = '$email'";
$result = $con->query($check_sql);

if ($result && $result->num_rows > 0) {
    session_start(); // Asegúrate de iniciar la sesión
    $_SESSION['error_message'] = "*Ya existe un cliente con este email.*";
    header("Location: ../registro.php");
    exit();
} else {
    // Consulta SQL para insertar un nuevo cliente
    $sql = "INSERT INTO clientes (nombre, apellido, email, clave) VALUES ('$nombre', '$apellido', '$email', '$clave')";

    // Ejecutar la consulta y verificar si fue exitosa

    if ($con->query($sql) == TRUE) { 
        $_SESSION['registrado'] = "*El cliente se registro exitosamente.*";
        header("Location: ../login.php");
        exit();
    } else {
        $_SESSION['NO_registrado'] = "*Error al registrar al cliente*".$con->error;
        header("Location: ../registro.php");
    }
// Cerrar la conexión a la base de datos
$con->close();
}
}
?>