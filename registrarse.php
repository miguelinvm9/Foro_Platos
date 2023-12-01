<?php
include 'conectaDataBase.php';
include 'usuarioModel.php';

//Recibi datos del Formulario
$nombre_usuario = $_POST['nombre_usuario'];
$nombre = $_POST['nombre'];
$apellidos = $_POST['apellidos'];
$contrasena = $_POST['contrasena'];
$esAdmin = $_POST['esAdmin'];
$correo = $_POST['correo'];
$experiencia = $_POST['experiencia'];
$etiqueta_usuario = $_POST['etiqueta_usuario'];

if(insertarUsuario($nombre_usuario,$nombre,$apellidos,$contrasena,$esAdmin,$correo,$experiencia,$etiqueta_usuario)){
    header('Location:iniciar_sesion.html');
}else{
    echo "Error al registrar el usuario.";
}

?>