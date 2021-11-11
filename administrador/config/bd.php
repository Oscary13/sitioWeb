<?php
$host="s29oj5odr85rij2o.cbetxkdyhwsb.us-east-1.rds.amazonaws.com";
$bd="p2atf3l0jrdmp6vu";
$usuario="tv5iiwt0r3m4sumg";
$contrasenia="gnnco1kqe10ked3q";
try {
    $conexion=new PDO("mysql:host=$host;dbname=$bd",$usuario,$contrasenia);
} catch (Exception $ex) {
    echo $ex->getMessage();
}
?>