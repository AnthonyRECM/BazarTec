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
    <link rel="stylesheet" href="./css/trajesdebaño.css">
    <title>Trajes de Baño</title>
    <link rel="shortcut icon" href="./images/logo.png"  width="30" height="30" type="img">

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>



</head>

<body class="fondo">
    <!--Header-->
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
                <h1 class="pt-5">Catálogo de Trajes de Baño</h1>
                <h2 class="py-3">¡¡Todo lo que necesitas para la playa y más!! </h2>
            </div>
        </div>
        <div class="row py-3 justify-content-center">
            <div class="col-4 mt-5">
                <h5 class="">Trajes de 2 piezas y completos para damas:</h5>
                <h5 class="">Bermudas, short de playa, buzos y mucho mas!</h5>
                <h5 class=""> </h5>
            </div>
            <div class="col-4">
                <div class="row">
                    <div class="col-3">
                        <img src="./images/bermudaAzul.png" width="250" alt="Imagen No Encontrada">
                    </div>
                    <div class="col-3">
                        <img src="./images/shortlicraUnisex.png" width="300" alt="Imagen No Encontrada">
                    </div>
                    <div class="col-3">
                        <img src="./images/bikiamarillo.png" width="300" alt="Imagen No Encontrada">
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
    </div>
    <div class="container-fluid fondo2"> 
        <div id="desplazarDestino" class="row my-5">
            <div class="col text-center">
                <h2 class="subtitulo">¡Trajes de baño para toda la familia!</h2>
            </div>
        </div>

    
        <div class="row justify-content-evenly my-5">

         <?php
             $contador = 2;
                $query = mysqli_query($con, 'SELECT p.id,p.name,p.quantity,p.sale_price,p.media_id,c.name AS categorie,m.file_name AS image
                 FROM products p LEFT JOIN categories c ON c.id = p.categorie_id LEFT JOIN media m ON m.id = p.media_id
                  WHERE categorie_id="1"');
                while ($consulta = mysqli_fetch_array($query)) {
                    if ($contador % 2 == 0){
                        echo "
                        <div class='col-1'>
                        </div>";
                    }
                    echo "
                        <div class='col-5 miniFondo1 my-4 cardd'>
                            <div class='row'>
                                <div class='col-4 text-start texto-producto'>
                                    <p class='letras2'>".$consulta['name']."</p>
                                    <p class='letras3'>".$consulta['sale_price']."</p>
                                    <br><br><br>
                                    <button href='#' class='styboton' data-id='1'><i class='fa-solid fa-cart-shopping' style='color: #ffffff;'></i></button>
                                </div>
                                <div class='col-8 imagenes-producto style=''>";
                                if($consulta['media_id'] === '0'):
                                    echo "<img style='width: auto; height: 100%' class='img-avatar img-circle' src='./admin/uploads/products/no_image.jpg' alt=''>";
                                else:
                                    echo "<img class='img-avatar img-circle' src='./admin/uploads/products/".$consulta['image']."' alt=''>";
                                endif;

                    echo "
                                </div>
                            </div>
                        </div>";
                    if ($contador % 2 == 1){
                        echo "
                        <div class='col-1'>
                        </div>";
                    }
                    $contador++;
                }   
            ?>
      </div>
   </div>
    <!--footer-->
    <footer style="background-color: #24A19C; color: #fff; padding: 20px; width: 100%; text-align: center;">
        <p style="margin: 0;">&copy; 2024 BazarTec. Todos los derechos reservados. | <a href="#" style="color: #fff; text-decoration: none;">Política de privacidad</a> | <a href="#" style="color: #fff; text-decoration: none;">Términos y condiciones</a></p>
    </footer>

    <script src="./bootstrap/js/bootstrap.min.js"></script>
    <script src="./js/pAccesorios.js"></script>
    <script src="./js/cAccesorios.js"></script>
</body>

</html>