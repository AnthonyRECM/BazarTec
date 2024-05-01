<?php
$db_hosting = 'Localhost';
$db_name = 'root';
$db_pass='';
$db_database='BazarTec';

$con = mysqli_connect($db_hosting,$db_name,$db_pass,$db_database);
if(mysqli_connect_errno()){
    echo 'No se pudo conectar a la base de datos : '.mysqli_connect_error();   
}else{
    // echo 'exito en la conexion';
}
?>