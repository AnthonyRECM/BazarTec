<?php
include './php/conexionDB.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="fontawesome/css/all.css">
    <link rel="stylesheet" href="./css/navBar.css">
    <link rel="stylesheet" href="./css/accesorios.css">
    <title>Accesorios</title>
    <link rel="shortcut icon" href="./images/logo.png"  width="30" height="30" type="img">
</head>


<body class="fondo">
    <div class="container-fluid fondo2"> 
        <div id="desplazarDestino" class="row my-5">
            <div class="col text-center">
                <h2 class="subtitulo">Inflables para albercas</h2>
            </div>
        </div>
        <!-- Aquí se mostrarán los productos -->
        <div id="productos">
            <?php
                $query = mysqli_query($con, 'SELECT * FROM products');
                while ($consulta = mysqli_fetch_array($query)) {
                    echo "";
                    echo "<div class='row align-items-center'>
                    <div class='col-6 text-end'>
                        <p class='letras2'>Inflable de cocodrilo</p>
                        <p class='letras3'>$320</p>
                        <p class='letras3'>1.70 mts de largo</p>
                        <p class='letras4 badge text-bg-success'>12 en stock</p>
                    </div>
                    <div class='col-6'>
                        <img src='./images/cocodrilo.jpg' width='240' alt=''>
                    </div>
                </div>";
                }
            ?>
        </div>
    </div>
</body>
</html>
