<?php


$hostname="localhost";
$username="root";
$password="";
$database="foro_platos";

try {
    $conexion = new PDO("mysql:host=$hostname;dbname=$database", $username, $password);
    $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Error en la conexión a la base de datos: " . $e->getMessage());
}



/*
$hostname="localhost";
$username="root";
$password="";
$database="foro_platos";
$mysqli = new mysqli($hostname,$username,$password,$database);
if($mysqli->connect_errno){
	die("Error conectando con BBDD");
}
*/
?>
