<!DOCTYPE html>
<html lang="en">

<!-- Required meta tags -->

<head>
    <meta charset="UTF-8">
    <title>BazarTec</title>
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Chivo+Mono:wght@500&family=DM+Serif+Display&display=swap"
        rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Rubik:wght@500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="./fontawesome/css/all.css">
    <link rel="shortcut icon" href="./images/logo.png" width="30" height="30" type="img">
    <link rel="stylesheet" type="text/css" href="./css/registro.css">
</head>

<body>
    <!--Header-->
    <div class="container-fluid-lg">
        <div class="row">
            <div class="col-12">
                <nav class="navbar navbar-expand-lg " style="background-color:#325288;">
                    <div class="container-fluid">
                        <a class="navbar-brand" href="index.html" style="color: white;">
                            <img src="./images/logo.png" alt="" width="50" height="50" class=" d-inline-block ">
                            BazarTec
                        </a>
                        <div class="collapse navbar-collapse">
                            <ul class="navbar-nav">
                                <li class="nav-item">
                                    <a class="nav-link active" style="color: white;" aria-current="page"
                                        href="#">Home</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link active" style="color: white;" aria-current="page"
                                        href="#">Contactanos</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </nav>
            </div>
        </div>
    </div>
    <!--Main o contenido-->
    <div class="container-fluid">
        <div class="row">
            <div class="col-7">
                <div class="container formatoRegistro ">
                    <form class="form needs-validation" novalidate action="./php/archivoRegistro.php" method="post"  onsubmit="return validarFormulario()">
                        <div class="row">
                            <div class="col-12" style="padding: 2rem;">
                                <h2> CREA TU CUENTA</h2>
                            </div>
                            <?php
session_start();
// Verificar si hay un mensaje de error registrado
if(isset($_SESSION['error_message'])) {
    echo '<div id="error-message" class="alert alert-danger" role="alert">' . $_SESSION['error_message'] . '</div>';
    unset($_SESSION['error_message']); // Limpiar la sesión para evitar mostrar el mensaje nuevamente
}
?>


                            <div class="col-6">
                                <input type="text" name="nombree" placeholder="Nombre" id="nombreCliente" required />
                                <div class="invalid-feedback">Por favor, ingresa tu nombre.
                                </div>
                            </div>
                            <div class="col-6">
                                <input type="text" name="apellido" placeholder="Apellidos" id="apellidoCliente"
                                    required />
                                <div class="invalid-feedback">Por favor, ingresa tus apellidos.
                                </div>
                            </div>
                            <div class="col-6">
                                <input type="text" name="email" placeholder="Email" id="emailCliente" required />
                                <div class="invalid-feedback">Por favor, ingresa tu email.
                                </div>
                            </div>
                            <div class="col-6">
                                <input type="password" name="clave" placeholder="Contraseña" id="contraseñaCliente"
                                    required />
                                <div class="invalid-feedback">Por favor, ingresa tu contraseña.
                                </div>
                            </div>
                            <div id="mensajeError"  style="color: red;"></div>

                            <div class="d-grid gap-2 col-6 mx-auto" style="padding: 1rem;">
                                <button type="submit" href="./login.html" value="Iniciar Sesión" type="button"
                                    name="crearCliente"><i class="fa-solid fa-pen-to-square"
                                        style="color: #ffffff;"></i> Crear
                                    cuenta</button>
                            </div>

                        </div>
                    </form>
                </div>
            </div>
            <div class="col-3"></div>

            <!--footer-->
            <div class="container-fluid-lg ">
                <footer class=" text-white text-center py-5 mt-5" style="background-color: #325288;">
                    <div class="row">
                        <p>&copy; 2024 BazarTec</p>
                    </div>
                </footer>
            </div>
        </div>
    </div>


<script>
// Esperar 3 segundos y luego ocultar el mensaje de error
setTimeout(function() {
    var errorMessage = document.getElementById('error-message');
    if (errorMessage) {
        errorMessage.style.display = 'none';
    }
}, 3000); // 3000 milisegundos = 3 segundos
</script>

<script>
function validarFormulario() {
    var nombre = document.getElementById("nombreCliente").value;
    var apellidos = document.getElementById("apellidoCliente").value;
    var email = document.getElementById("emailCliente").value;
    var contraseña = document.getElementById("contraseñaCliente").value;

    // Verificar si los campos están vacíos
    if (nombre.trim() === '' || apellidos.trim() === '' || email.trim() === '' || contraseña.trim() === '') {
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

    <script src="bootstrap/js/bootstrap.min.js"></script>
</body>

</html>