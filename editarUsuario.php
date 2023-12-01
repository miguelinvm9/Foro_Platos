<?php
session_start();
require 'usuarioModel.php';
?>



<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrarse</title>
    <link rel="stylesheet" href="registrar_style.css">
    <link rel="icon" sizes="64x64" href="img/descarga.jpg">
</head>
<body>
    <div class="login-container">
        <h1>Registrarse</h1>

        <!DOCTYPE html>
        <html lang="es">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <link rel="stylesheet" href="styles.css">
            <title>Registro de Usuario</title>
        </head>
        <body>
        <?php 
            $id = $_GET['id'];
            $usuario = consultarUsuarioID($id);
        ?>
            <form action="UpdateUsuario/actualizaUsuario.php" method="POST" class="registration-form">
                <input type="hidden" name="id" value="<?php echo $usuario['id']; ?>">
                <div class="form-group">
                    <label for="correo">Mail:</label>
                    <input type="text" id="correo" name="correo" value = "<?php echo $usuario ['correo'] ; ?>" required>
                </div>
                <div class="form-group">
                    <label for="nombre_usuario">Nombre de Usuario:</label>
                    <input type="text" id="nombre_usuario" name="nombre_usuario" value = "<?php echo $usuario ['nombre_usuario'] ; ?>" required>
                </div>
                <div class="form-group">
                    <label for="nombre">Nombre:</label>
                    <input type="text" id="nombre" name="nombre" value = "<?php echo $usuario ['nombre'] ; ?>" required>
                </div>
                <div class="form-group">
                    <label for="apellidos">Apellidos:</label>
                    <input type="text" id="apellidos" name="apellidos" value = "<?php echo $usuario ['apellidos'] ; ?>" required>
                </div>
                <div class="form-group">
                    <label for="contrasena">Contraseña:</label>
                    <input type="password" id="contrasena" name="contrasena" value = "<?php echo $usuario ['contrasena'] ; ?>" required>
                </div>
                <div class="form-group">
                    <label for="esAdmin">¿Es administrador?:</label>
                    <input type="text" id="esAdmin" name="esAdmin" value = "<?php echo $usuario ['esAdmin'] ; ?>"required>
                </div>
                <div class="form-group">
                    <label for="etiqueta_usuario">Etiqueta Usuario:</label>
                    <input type="text" id="etiqueta_usuario" name="etiqueta_usuario" value = "<?php echo $usuario ['etiqueta_usuario'] ; ?>" required>
                </div>
                <div class="form-group">
                    <label for="experiencia">Experiencia:</label>
                    <select name="experiencia" id="experiencia">
                        <option value="Principiante" <?php if ($usuario['experiencia'] === 'Principiante') echo 'selected';?> >Principiante</option>
                        <option value="Amateur" <?php if ($usuario['experiencia'] === 'Amateur') echo 'selected';?>  >Amateur</option>
                        <option value="Experimentado" <?php if ($usuario['experiencia'] === 'Experimentado') echo 'selected';?>  >Experimentado</option>
                        <option value="Profesional Novato" <?php if ($usuario['experiencia'] === 'Profesional Novato') echo 'selected';?> >Profesional Novato</option>
                        <option value="Profesional Experimentado" <?php if ($usuario['experiencia'] === 'Profesional Experimentado') echo 'selected';?> >Profesional Experimentado</option>
                    </select>
                </div>
                <button type="submit">Iniciar</button>
            </form>
         
        
    </div>
</body>
</html>