<?php
include './php/conexionDB.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="./fontawesome/css/all.css">
    <link rel="stylesheet" href="./css/navBar.css">
    <link rel="stylesheet" href="./css/accesorios.css">
    <title>Accesorios</title>
    <link rel="shortcut icon" href="./images/logo.png"  width="30" height="30" type="img">

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>


<body class="fondo">
    <div class="container-fluid">
        <div class="row">
            <div class="menu">
                <a href="./index.html" class="logo"><img src="images/logo.png" width="60px" height="60px"></a>
                <input type="checkbox" id="menu" />
                <label for="menu"><img src="images/menu.png" class="menu-icono" alt=""></label>
                <nav class="navbar">
                    <ul>
                        <li><a href="./index.html">Inicio</a></li>
                        <li><a href="./trajesdeBaño.html">Traje de baño</a></li>
                        <li><a href="./catalogoCalzado.html">Calzado</a></li>
                        <li><a href="./catalogoAccesorios.html">Accesorios</a></li>
                    </ul>
                </nav>
                <div>
                    <ul>
                        <li class="submenu">
                            <a href="#" class="logo"></a><img src="images/car.svg" id="img-carrito" alt="">
                            <div id="carrito">
                                <table id="lista-carrito">
                                    <thead>
                                        <tr>
                                            <th>Imagen</th>
                                            <th>Nombre</th>
                                            <th>Precio</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody></tbody>
                                </table>
                                <a href="#" id="vaciar-carrito" class="btn-3">Vaciar Carrito</a>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    
    <div class="container-fluid fondo1">
        <div class="row gx-0 text-center">
            <div class="col-12">
                <h1 class="pt-5">Catálogo de Articulos</h1>
                <h2 class="py-3">¡¡Todo lo que necesitas para la playa y más!! </h2>
            </div>
        </div>
        <div class="row py-3 justify-content-center">
            <div class="col-4 mt-5">
                <h5 class="">Inflables para niños y niñas:</h5>
                <h5 class="">Tiburon, cocodrilo, delfín y muchos más</h5>
                <h5 class=""> </h5>
            </div>
           <div class="col-4">
                <div class="row">
                    <div class="col-3">
                        <img src="./images/tortuga.png" width="300" alt="Imagen No Encontrada">
                    </div>
                    <div class="col-3">
                        <img src="./images/orca.png" width="300" alt="Imagen No Encontrada">
                    </div>
                    <div class="col-3">
                        <img src="./images/flamingo.png" width="300" alt="Imagen No Encontrada">
                    </div>
                </div>
           </div>
        </div>
        <div class="row text-center desplazarMov">
            <div class="col-12 mt-3">
                <p class="letras1">Ver mas</p>
            </div>
            <div class="col mb-2">
                <i class="fa-solid fa-chevron-down fa-lg"></i>
            </div>
        </div>
    </div>
    
    <div class="container-fluid fondo2"> 
        <div id="desplazarDestino" class="row my-5">
            <div class="col text-center">
                <h2 class="subtitulo">Inflables para albercas</h2>
            </div>
        </div>

        <div class="row justify-content-evenly my-5">

            <?php
                $query = mysqli_query($con, 'SELECT name,quantity,sale_price,media_id FROM products');
                while ($consulta = mysqli_fetch_array($query)) {
                    echo "
                    <div class='col-4 miniFondo1 my-4 mx-4'>
                        <div class='row align-items-center'>
                            <div class='col-6 text-end'>
                                <p class='letras2'>".$consulta['name']."</p>
                                <p class='letras3'>".$consulta['quantity']."</p>
                                <p class='letras3'>".$consulta['sale_price']."</p>
                            </div>
                            <div class='col-6'>
                                <img src='".$consulta['media_id']."' width='240' alt=''>
                            </div>
                        </div>
                    </div>";
                }   
            ?>
    </div>

    <script src="./bootstrap/js/bootstrap.min.js"></script>
    <script src="./js/pAccesorios.js"></script>
</body>
</html>