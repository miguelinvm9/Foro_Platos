<?php
$id = $_GET['id_receta'];

include 'conectaDatabase.php';
include 'RECETA/recetaModel.php';


if(eliminarRecetaPorID($id)){
    header("Location: recetasAdmin.php");
}else{
    echo 'Ha ocurrido un error';
}

?>
