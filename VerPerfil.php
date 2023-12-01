<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Foro de Platos</title>
    <link rel="stylesheet" type="text/css" href="estilo_index.css">
    <link rel="icon" sizes="64x64" href="img/descarga.jpg">
</head>
<?php
include 'conectaDataBase.php';

session_start();

if(!($_SESSION['esAdmin']==1)){
    header("Location: index.php");
    exit();
}

function listarUsuarios() {
    global $conexion;
    $consulta = "SELECT * FROM usuario";
    $resultado = $conexion->query($consulta);
    $usuarios = array();

    if ($resultado) {
        while ($fila = $resultado->fetch(PDO::FETCH_ASSOC)) {
            $usuarios[] = $fila;
        }
        return $usuarios;
    }

    return array();
}

$usuarios = listarUsuarios();
if (!empty($usuarios)) {
    echo "<nav>";
        echo "<ul>";
            echo "<li><a href=\"index.php\">Inicio</a></li>";
            echo "<li><a href=\"recetas.php\">Recetas</a></li>";
            echo "<li><a href=\"cerrarSesion.php\">Cerrar Sesión</a></li>";
            if($_SESSION['esAdmin']==1){
                print '<li><a href=\"verPerfil.php\">Ver Usuarios</a></li>';
                print '<li><a href=\"recetasAdmin.php\">Ver Recetas</a></li>';
            }

            echo "<li><a href=\"MiPerfil.php\">Mi Perfil</a></li>";
            echo "<li><a href=\"baja_usuario.php\">DARSE DE BAJA</a></li>";
        echo "</ul>";
    echo "</nav>";
    foreach ($usuarios as $usuario) {
      /*  echo "<li>ID: " . $usuario['id'] . " - Nombre  Usuario: " . $usuario['nombre_usuario'] . " - Nombre:" . $usuario['nombre'] . " - Apellidos: " . $usuario['apellidos'] . " - Contraseña" . $usuario['contrasena'] . "- esAdmin" . $usuario['esAdmin'] . "- Experiencia" .$usuario['etiqueta_usuario']." - Correo: " . $usuario['correo'] . "</li>";*/
        
        echo "<div>";
        echo "<table class='table1'>";
        echo "<tr><td><b><li>ID:</b></td><td>&nbsp;&nbsp;" . $usuario['id'] . "</li></td></tr>";
        echo "<tr><td><b><li>Nombre Usuario:</b></td><td>&nbsp;&nbsp;" . $usuario['nombre_usuario'] . "</li></td></tr>";
        echo "<tr><td><b><li>&nbsp;</b></td><td></li></td></tr>";
        echo "<tr><td><b><li>Nombre:</b></td><td>&nbsp;&nbsp;" . $usuario['nombre'] . "</li></td></tr>";
        echo "<tr><td><b><li>Apellidos:</b></td><td>&nbsp;&nbsp;" . $usuario['apellidos'] . "</li></td></tr>";
        echo "<tr><td><b><li>Contraseña:</b></td><td>&nbsp;&nbsp;" . $usuario['contrasena'] . "</li></td></tr>";
        echo "<tr><td><b><li>es_Admin:</b></td><td>&nbsp;&nbsp;" . $usuario['esAdmin'] . "</li></td></tr>";
        echo "<tr><td><b><li>Correo:</b></td><td>&nbsp;&nbsp;" . $usuario['correo'] . "</li></td></tr>";
        echo "<tr><td><b><li>Experiencia:</b></td><td>&nbsp;&nbsp;" . $usuario['experiencia'] . "</li></td></tr>";
        echo "<tr><td><b><li>Etiqueta Usuario:</b></td><td>&nbsp;&nbsp;" . $usuario['etiqueta_usuario'] . "</li></td></tr>";
        if($_SESSION['esAdmin']==1 && $usuario['id']==1){
            echo '<tr><td><b><a href="EditarUsuario.php?id=' . $usuario['id'] . '">Editar Usuario</a></b></td><td>&nbsp;</td></tr>';
        }else if($_SESSION['esAdmin']==1 && $usuario['esAdmin']==1){
            echo '<tr><td><b><a href="EditarUsuario.php?id=' . $usuario['id'] . '">Editar Usuario</a></b></td><td><b><a href="UpdateUsuario/quitarAdmin.php?id=' . $usuario['id'] . '">QUITAR ADMIN</a></b></td></tr>';
        }else{
            echo '<tr><td><b><a href="EditarUsuario.php?id=' . $usuario['id'] . '">Editar Usuario</a></b></td><td><b><a href="UpdateUsuario/hacerAdmin.php?id=' . $usuario['id'] . '">HACER ADMIN</a></b></td></tr>';
        }
        echo '<tr><td><b><a href="UpdateUsuario/eliminarUsuario.php?id=' . $usuario['id'] . '">Eliminar</a></b></td><td>&nbsp;&nbsp;</td></tr>';

        echo "</table>";
        echo "</div>";
        

    }
    echo "</ul>";
} else {
    echo "No se encontraron usuarios en la base de datos.";
}
?>
<link rel="stylesheet" type="text/css" href="VerPerfil.css">

