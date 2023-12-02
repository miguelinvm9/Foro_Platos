<?php
session_start();


require 'RECETA/recetaModel.php';
if(actualizarReceta($_POST['id'],$_POST['nombre'],$_POST['tiempo'],$_POST['dificultad'],$_POST['texto'],/*$_POST['imagen'],*/$_SESSION['id_usuario'])){
    header('Location: recetasAdmin.php');

}else{
    echo "Error actualizar Usuario";
}

?>