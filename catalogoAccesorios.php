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
    <style>
        .mensaje {
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            background-color: #fff;
            padding: 10px 20px;
            border-radius: 5px;
            border: 1px solid #000;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
            z-index: 9999;
        }

        #lista-carrito .borrar {
    color: white; /* Color blanco para la "x" */
    font-size: 1.2em; /* Tamaño de fuente más grande */
    cursor: pointer; /* Cambia el cursor al pasar sobre la "x" */
    transition: color 0.3s, background-color 0.3s; /* Transición suave para el cambio de color */
    border: 2px solid white; /* Borde blanco para el círculo */
    border-radius: 50%; /* Hace que el borde sea circular */
    width: 25px; /* Ancho de la "x" */
    height: 25px; /* Altura de la "x" */
    background-color: purple; /* Fondo morado */
    display: inline-flex; /* Hace que el contenido esté centrado verticalmente */
    align-items: center; /* Centra verticalmente el contenido */
    justify-content: center; /* Centra horizontalmente el contenido */
    text-align: center; /* Centra el texto horizontalmente */
}

#lista-carrito .borrar:hover {
    background-color: darkpurple; /* Fondo morado más oscuro al pasar el cursor */
}


    </style>
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
                        <li><a href="./trajesdeBaño.php">Traje de baño</a></li>
                        <li><a href="./catalogoCalzado.php">Calzado</a></li>
                        <li><a href="./catalogoAccesorios.php">Accesorios</a></li>
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
                                <a href="#" id="vaciar-carrito" class="btn btn-danger">Vaciar Carrito</a>
                                <a href="pago.html" id="comprar-carrito" class="btn btn-success">Comprar Carrito</a>
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
                <h2 class="subtitulo">¡Inflables para albercas y mas!</h2>
            </div>
        </div>

        <div class="row justify-content-evenly my-5">
            
            <?php
            $contador = 2;
                $query = mysqli_query($con, 'SELECT p.id,p.name,p.quantity,p.sale_price,p.media_id,c.name AS categorie,m.file_name AS image
                 FROM products p LEFT JOIN categories c ON c.id = p.categorie_id LEFT JOIN media m ON m.id = p.media_id
                  WHERE categorie_id="3"');
                while ($consulta = mysqli_fetch_array($query)) {
              
                    echo "
                        <div class='col-5 miniFondo1 my-4 mx-1 cardd'>
                            <div class='row'>
                                <div class='col-4 text-start texto-producto'>
                                    <p class='letras2'>".$consulta['name']."</p>
                                    <p class='letras3'>".$consulta['sale_price']."</p>
                                    <button class='styboton agregar-carrito' data-id='".$consulta['id']."'><i class='fa-solid fa-cart-shopping' style='color: #00C0B9;'></i></button>
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
                    $contador++;
                }   
            ?>
        </div>
    </div>
    <footer style="background-color: #24A19C; color: #fff; padding: 20px; width: 100%; text-align: center;">
        <p style="margin: 0;">&copy; 2024 BazarTec. Todos los derechos reservados. | <a href="#" style="color: #fff; text-decoration: none;">Política de privacidad</a> | <a href="#" style="color: #fff; text-decoration: none;">Términos y condiciones</a></p>
    </footer>

    <script src="./bootstrap/js/bootstrap.min.js"></script>
    <script src="./js/pAccesorios.js"></script>
    <script src="./js/c Accesorios.js"></script>

</body>
</html>
