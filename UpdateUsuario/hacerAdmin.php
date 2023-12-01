<?php
$id = $_GET['id'];

include 'conectaDatabase.php';
include '../usuarioModel.php';


if(hacerAdminUsuarioPorId($id)){
    header("Location: ../verPerfil.php");
}else{
    echo 'Ha ocurrido un error';
}

?>

 