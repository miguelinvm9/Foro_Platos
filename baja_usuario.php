<?php
session_start();

include 'conectaDatabase.php';
include 'usuarioModel.php';

// Método para eliminar un usuario por su ID
function bajaUsuario($id) {
    global $conexion;
    eliminarUsuarioRecetaPorID($id);
    $sql = "DELETE FROM usuario WHERE id = :id";
    $stmt = $conexion->prepare($sql);
    $stmt->bindParam(':id', $id);
    
    return $stmt->execute();
}


if(bajaUsuario($_SESSION['id_usuario'])){
    header("Location: cerrarSesion.php");
}else{
    echo 'Ha ocurrido un error';
}

?>

 