<?php
session_start();

// Conexión a la base de datos
$db_hosting = 'localhost';
$db_name = 'root';
$db_pass = '';
$db_database = 'BazarTec';
$conn = new mysqli($db_hosting, $db_name, $db_pass, $db_database);

// Verificar la conexión
if ($conn->connect_error) {
    exit();
}

// Verificar si se recibió algún dato
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Leer el arreglo JSON enviado desde JavaScript
    $input = file_get_contents("php://input");
    $carrito = json_decode($input, true);


    if ($carrito) {
        $errores = [];
        foreach ($carrito as $producto) {
            $id = $producto['id'];
            $nombre = $producto['nombre'];
            $precio = $producto['precio'];

            // Insertar el producto en la tabla de ventas
            $sql = "INSERT INTO sales (product_id, qty, price, date) VALUES ('$id', 1, '$precio', NOW())";
            if ($conn->query($sql) !== TRUE) {
                $errores[] = "Error al insertar producto ID $id: " . $conn->error;
            }

        }

        if (empty($errores)) {
            $conn->close(); // Cierra la conexión antes de redirigir
            echo json_encode(['status' => 'success', 'message' => 'Compra procesada correctamente']);
        } else {
            $conn->close();
            echo json_encode(['status' => 'error', 'errors' => $errores]);
        }
        exit();
    } else {
        // Si no se recibió ningún dato JSON válido
        http_response_code(400);
        $conn->close();
        exit();
    }
} else {
    // Si no se recibió ningún dato
    http_response_code(400);
    $conn->close();
    exit();
}
?>
