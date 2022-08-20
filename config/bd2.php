<?php
$host="localhost";
$bd="nomina";
$usuario="root";
$contrasenia="";

try {
    $conexion=new PDO("mysql:host=$host;dbname=$bd",$usuario,$contrasenia);

} catch (exception $ex) {
   
    echo $ex->getmessage();
}
?>