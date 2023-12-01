<?php
$id = $_GET['id'];

include 'conectaDatabase.php';
include '../usuarioModel.php';


if(eliminarUsuarioPorID($id)){
    header("Location: ../verPerfil.php");
}else{
    echo 'Ha ocurrido un error';
}

?>

 