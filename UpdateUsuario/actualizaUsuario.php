<?php
session_start();


require '../usuarioModel.php';
if(actualizarUsuario($_POST['id'],$_POST['nombre_usuario'],$_POST['nombre'],$_POST['apellidos'],$_POST['contrasena'],$_POST['esAdmin'],$_POST['correo'],$_POST['experiencia'],$_POST['etiqueta_usuario'])){
    header('Location: ../VerPerfil.php');

}else{
    echo "Error actualizar Usuario";
}

?>