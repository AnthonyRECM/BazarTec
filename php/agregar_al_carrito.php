<?php
// Incluye el archivo de conexión a la base de datos
include './php/conexionDB.php';

// Verifica si se recibió un ID de producto en la solicitud POST
if (isset($_POST['product_id'])) {
    // Obtiene el ID del producto de la solicitud POST
    $productId = $_POST['product_id'];

    // Aquí puedes implementar la lógica para agregar el producto al carrito en la base de datos
    // Por ejemplo, podrías ejecutar una consulta SQL para insertar el producto en una tabla de carrito

    // Ejemplo de consulta SQL (suponiendo que tienes una tabla llamada 'carrito'):
    // $query = "INSERT INTO carrito (product_id) VALUES ('$productId')";
    // mysqli_query($con, $query);

    // Devuelve una respuesta exitosa al cliente
    http_response_code(200); // OK
    echo 'Producto agregado al carrito correctamente';
} else {
    // No se recibió un ID de producto en la solicitud POST, devuelve un error
    http_response_code(400); // Bad Request
    echo 'Error: ID de producto no recibido en la solicitud';
}
?>
