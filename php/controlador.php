<?php
session_start();
// Verificamos si se envió el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Conexión a la base de datos (reemplaza estos valores con los tuyos)
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "BazarTec";

    // Crear conexión
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Verificar conexión
    if ($conn->connect_error) {
        die("Conexión fallida: " . $conn->connect_error);
    }

    // Obtener los datos del formulario
    $correo = $_POST['correo'];
    $contraseña = $_POST['clave']; 

    // Consulta SQL para verificar las credenciales del usuario
    $sql = "SELECT * FROM clientes WHERE email = '$correo' AND clave = '$contraseña'";
    $result = $conn->query($sql);

    // Verificar si se encontró un usuario con esas credenciales
    if ($result->num_rows > 0) {
        // Inicio de sesión exitoso
        session_start();
        $_SESSION['loggedin'] = true;
        $_SESSION['correo'] = $correo;
        // Redireccionar a la página de inicio o a donde desees
        header("Location: ../index.html");
    } else {
        // Credenciales incorrectas, mostrar mensaje de error
        echo "Los campos estan vacios";
    }

    // Cerrar conexión
    $conn->close();
}
?>
