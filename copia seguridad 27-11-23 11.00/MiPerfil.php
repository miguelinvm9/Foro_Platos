<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mi perfil</title>
    <link rel="stylesheet" href="MiPerfil.css">
</head>
<body>
    <?php
    session_start();
    include 'conectaDatabase.php';
    include 'usuarioModel.php';
    if(!isset($_SESSION['id_usuario'])){
        //El usuario no esta logueado
        header('Location: iniciar_sesion.php');
        exit;
    }


    //Obtenemos el nombre del usuario que ha iniciado sesion
    $nombre_usuario = $_SESSION['nombre_usuario'];

    $usuario = consultarUsuario($nombre_usuario);
    if($usuario){
        echo '<h1>Tu perfil</h1>';
        echo '<table border="1">';
        echo '<thead>';
        echo '<tr>';
        echo '<th>Nombre de usuario</th>';
        echo '<th>Apellidos</th>';
        echo '<th>¿Es admin?</th>';
        echo '<th>Correo</th>';
        echo '<th>Experiencia</th>';
        echo '<th>Etiqueta usuario</th>';
        echo '</tr>';
        echo '</thead>';
        echo '<tbody>';
        echo '<tr>';

        echo '<td>' .$usuario['nombre'] .'</td>';
        echo '<td>' .$usuario['apellidos'] .'</td>';
        echo '<td>' .$usuario['esAdmin'] .'</td>';
        echo '<td>' .$usuario['correo'].'</td>';
        echo '<td>' .$usuario['experiencia'] .'</td>';
        echo '<td>' .$usuario['etiqueta_usuario'] .'</td>';
        echo '</tr>';
        echo '</tbody>';
        echo '</table>';
        } else {
                echo 'Usuario no encontrado';
            }
    ?>
</body>
</html>