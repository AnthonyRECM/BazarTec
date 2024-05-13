<?php
// Incluye el archivo controlador.php para acceder a $error_msg
include './php/controlador.php';
?>
<!DOCTYPE html>
<html lang="en">

<!-- Required meta tags -->

<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Chivo+Mono:wght@500&family=DM+Serif+Display&display=swap"
        rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Rubik:wght@500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="./fontawesome/css/all.css">
    <link rel="shortcut icon" href="./images/logo.png" width="30" height="30" type="img">
    <link rel="stylesheet" type="text/css" href="./css/login.css">
</head>



<body>
    <!--Header-->
    <div class="container-fluid-lg">
        <div class="row">
            <div class="col-12">
                <nav class="navbar navbar-expand-lg " style="background-color:#5F5D9C;">
                    <div class="container-fluid">
                        <a class="navbar-brand" href="index.html" style="color: white;">
                            <img src="./images/logo.png" alt="" width="50" height="50" class=" d-inline-block ">
                            BazarTec
                        </a>
                        <div class="collapse navbar-collapse">
                            <ul class="navbar-nav">
                                
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
            <div class="col-6">
                <div class="container formatoLogin ">
                    <form class="form needs-validation" novalidate action="./php/controlador.php" method="post"
                        onsubmit="return validarFormulario()">

                        <div class="row">
                            <div class="col-12" style="padding: 2rem;">

                                <h2> ENTRA A TU CUENTA</h2>
                            </div>
                            <?php
// Verificar si hay un mensaje de éxito registrado
if(isset($_SESSION['registrado'])) {
    echo '<div id="success-message" class="alert alert-success" role="alert">' . $_SESSION['registrado'] . '</div>';
    unset($_SESSION['registrado']); // Limpiar la sesión para evitar mostrar el mensaje nuevamente
}
?>
                            <div class="col-12">
                                <input type="text" name="correo" placeholder="Correo" id="nombreCliente" required />
                                <div class="invalid-feedback">Por favor, ingresa tu correo.
                                </div>
                            </div>
                            <div class="col-12">
                                <input type="password" name="clave" placeholder="Contraseña" id="contraseñaCliente"
                                    required />
                                <div class="invalid-feedback">Por favor, ingresa tu contraseña.
                                </div>
                            </div>
                            <!-- Aquí puedes mostrar el mensaje de error 
                        <div id="mensajeError" class="alert alert-danger" role="alert" ></div>-->
                            <div id="mensajeError" style="color: red;"></div>

                        </div>

                        <div class="d-grid gap-2 col-6 mx-auto" style="padding: 1rem;">
                            <button type="submit" value="Iniciar Sesión" type="button" name="btningresar"><i
                                    class="fa-solid fa-arrow-up" style="color: #ffffff;"></i> Inicia
                                sesión</button>
                        </div>

                </div>
                </form>

            </div>
            <div class="col-6">
                <div class="container formatoLogin ">
                    <form class="form needs-validation" novalidate action="" method="post">
                        <div class="row">
                            <div class="col-12" style="padding: 2rem; ">

                                <h2> ¿NO TIENES CUENTA? REGISTRATE Y HAZ TUS COMPRAS MÁS RÁPIDO.</h2>
                            </div>
                            <div class="d-grid gap-2 col-6 mx-auto" style="padding: 1rem;">
                                <button type="button" onclick="window.location.href='./registro.php'"
                                    name="btningresarRegistro"><i class="fa-solid fa-pen-to-square"
                                        style="color: #ffffff;"></i> Crear
                                    cuenta</button>
                            </div>

                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!--footer-->
    <div class="container-fluid-lg ">
        <footer class=" text-white text-center py-5 mt-5" style="background-color: #5F5D9C;">
            <div class="row">
                <p>&copy; 2024 BazarTec</p>
            </div>
        </footer>
    </div>
    </div>
    </div>


    <script>
        // Esperar 3 segundos y luego ocultar el mensaje de éxito
        setTimeout(function () {
            var successMessage = document.getElementById('success-message');
            if (successMessage) {
                successMessage.style.display = 'none';
            }
        }, 3000); // 3000 milisegundos = 3 segundos
    </script>
<script>
function validarFormulario() {
    var correo = document.getElementById("nombreCliente").value;
    var clave = document.getElementById("contraseñaCliente").value;

    // Verificar si los campos están vacíos
    if (correo.trim() === '' || clave.trim() === '') {
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