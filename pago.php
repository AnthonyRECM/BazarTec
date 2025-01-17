<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pago en Línea</title>
    <style>
        /* Estilos CSS aquí */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #05DFD7;
        }
        .container {
            max-width: 600px;
            margin: 50px auto;
            padding: 20px;
            background-color: #FAEEE7;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h2 {
            text-align: center;
        }
        label {
            display: block;
            margin-bottom: 10px;
        }
        input[type="text"], input[type="number"], input[type="date"], input[type="tel"] {
            width: calc(100% - 40px); /* Ajuste de tamaño */
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        .card-image {
            width: 100%;
            max-width: 300px; /* Ajuste de tamaño */
            margin: 0 auto;
            display: block;
        }
        input[type="submit"] {
            background-color: #007bff;
            color: #fff;
            padding: 12px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
        }
        input[type="submit"]:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Ingresa tus datos de pago</h2>
        <img src="./images/tarjeta.png" alt="Tarjeta de crédito" class="card-image">
            <div id="mensajeError" style="color: red;"></div>
            <br>
            <label for="nombre">Nombre en la tarjeta:</label>
            <input type="text" id="nombre" name="nombre" required>
            <label for="numero">Número de tarjeta:</label>
            <input type="text" id="numero" name="numero" pattern="[0-9]{16}" required>
            <label for="expiracion">Fecha de expiración:</label>
            <input type="text" id="expiracion" name="expiracion" placeholder="MM/AA" pattern="(0[1-9]|1[0-2])\/([0-9]{2})" required>
            <label for="cvv">CVV:</label>
            <input type="text" id="cvv" name="cvv" pattern="[0-9]{3,4}" required>
            <label for="telefono">Teléfono de contacto:</label>
            <input type="tel" id="telefono" name="telefono" required>
            <form action="procesar_pago.html" novalidate method="get"
                        onsubmit="return validar()">
                <input type="submit" value="Pagar">
        </form>
        
        <div id="mensajeError" style="color: red;"></div>
    </div>

    <script>
function validar() {
    var nombre = document.getElementById("nombre").value;
    var numero = document.getElementById("numero").value;
    var expiracion = document.getElementById("expiracion").value;
    var telefono = document.getElementById("telefono").value;

    // Verificar si los campos están vacíos
    if (nombre.trim() === '' || numero.trim() === '' || expiracion.trim() === '' || telefono.trim() === '') {
        // Mostrar mensaje de error
        var mensajeError = document.getElementById("mensajeError");
        mensajeError.innerHTML = "Por favor, completa todos los campos.";
        mensajeError.style.display = 'block'; // Mostrar el mensaje de error

        // Ocultar el mensaje de error después de 3 segundos
        setTimeout(function() {
            mensajeError.style.display = 'none';
        }, 3000);

        // Evitar que el formulario se envíe
        return false;
    }
    return true; // Permitir el envío del formulario si los campos están completos
}
</script>
    
</body>
</html>