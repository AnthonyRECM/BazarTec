<?php
  ob_start();
  require_once('includes/load.php');
  if($session->isUserLoggedIn(true)) { redirect('home.php', false);}
?>
<?php include_once('layouts/header.php'); ?>
<style>
    /* Estilos CSS para la página */
    body {
        margin: 0;
        padding: 0;
        background-color: #469FFF; /* Azul claro */
        display: flex;
        justify-content: center;
        align-items: center;
        height: 85vh;
    }
    /* Estilos CSS para el contenedor del formulario */
    .login-container {
        width: 300px; /* Ancho del contenedor de inicio de sesión */
        background-color: white;
        padding: 20px;
        border-radius: 5px;
        text-align: center; /* Alinear el texto al centro */
    }
    .login-container h1,
    .login-container p {
        margin: 0; /* Eliminar el margen para evitar espacio adicional */
    }
</style>
<div class="login-page">
    <div class="login-container">
        <h1>Bienvenido a BazarTec</h1>
        <p>Iniciar sesión</p>
        <?php echo display_msg($msg); ?>
        <form method="post" action="auth.php" class="clearfix">
            <div class="form-group">
                <label for="username" class="control-label">Usuario</label>
                <input type="name" class="form-control" name="username" placeholder="Usuario">
            </div>
            <div class="form-group">
                <label for="Password" class="control-label">Contraseña</label>
                <input type="password" name= "password" class="form-control" placeholder="Contraseña">
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-info">Entrar</button>
            </div>
        </form>
    </div>
</div>
<?php include_once('layouts/footer.php'); ?>
