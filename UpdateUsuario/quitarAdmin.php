<?php
$id = $_GET['id'];

include 'conectaDatabase.php';
include '../usuarioModel.php';


if(deshacerAdminUsuarioPorId($id)){
    header("Location: ../verPerfil.php");
}else{
    echo 'Ha ocurrido un error';
}

?>

 