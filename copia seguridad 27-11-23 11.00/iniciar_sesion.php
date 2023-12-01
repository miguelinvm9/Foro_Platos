<?php

include 'conectaDatabase.php';
$nombre_usuario=$_POST['nombre'];
$contrasena = $_POST['contrasena'];
$unaQuery="SELECT * FROM usuario WHERE nombre_usuario= :nombre_usuario";
$resultado=$conexion->prepare($unaQuery);
$resultado->bindParam(':nombre_usuario',$nombre_usuario);
$resultado->execute();

$userRow=$resultado->fetch(PDO::FETCH_ASSOC);

$password = $userRow['contrasena'];
$hash = crypt($contrasena,$password);

if($userRow && $contrasena==$password){
	
	session_start();
	$_SESSION['id_usuario']=$userRow['id'];
	$_SESSION['nombre_usuario']=$userRow['nombre_usuario'];
	$_SESSION['esAdmin']=$userRow['esAdmin'];
	header("Location: index.php");
}	
			//index.php
else{
    //Si falla la conexion me reedirige a la página de iniciar_sesion
	echo '<script languaje="JavaScript">alert("Algo ha fallado")</script>';
	header("Location: iniciar_sesion.html");
}


/*
include 'conectaDatabase.php';
session_start();

$nombre=$_POST['nombre'];
$unaQuery="SELECT * FROM usuario WHERE nombre_usuario='$nombre'";
$resultado=$mysqli->query($unaQuery);
$userRow=mysqli_fetch_assoc($resultado);
if($_POST['contrasenya']==$userRow['contrasena']){
	
	$_SESSION['id_usuario']=$userRow['id'];
	$_SESSION['nombre']=$userRow['nombre_usuario'];
	$_SESSION['esAdmin']=$userRow['esAdmin'];
	header("Location: index.php");
}	
			//index.php
else{
    //Si falla la conexion me reedirige a la página de iniciar_sesion
	echo '<script languaje="JavaScript">alert("Algo ha fallado")</script>';
	header("Location: iniciar_sesion.html");
}

*/
?>