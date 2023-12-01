<?php
session_start();
print_r($_SESSION);
echo "<br><br><br>";
print_r($_POST);
echo "<br><br><br>";
require 'usuarioModel.php';
actualizarUsuario($_SESSION['id'],$_POST['nombre_usuario'],$_POST['nombre'],$_POST['apellidos'],$_SESSION['esAdmin'],$_POST['correo'],$_POST['experiencia'],$_POST['etiqueta_usuario']);
header('Location: formularioActualizaUsuario.php');
?>