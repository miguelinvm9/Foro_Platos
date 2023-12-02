<?php
session_start();
require 'RECETA/recetaModel.php';
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
        <h1>Actualizar</h1>

        <!DOCTYPE html>
        <html lang="es">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <link rel="stylesheet" href="styles.css">
            <title>Actualizar receta</title>
        </head>
        <body>
        <?php 
            $id = $_GET['id_receta'];
            $receta = consultarRecetasID($id);
        ?>
            <form action="actualizarReceta.php" method="POST" class="registration-form">
                <input type="hidden" name="id" value="<?php echo $receta['id']; ?>">
                <div class="form-group">
                    <label for="nombre">Nombre:</label>
                    <input type="text" id="nombre" name="nombre" value = "<?php echo $receta ['nombre'] ; ?>" required>
                </div>
                <div class="form-group">
                    <label for="tiempo">Tiempo:</label>
                    <input type="text" id="tiempo" name="tiempo" value = "<?php echo $receta ['tiempo'] ; ?>" required>
                </div>

                <div class="form-group">
                    <label for="dificultad">Dificultad:</label>
                    <select name="dificultad" id="dificultad">
                        <option value="facil" <?php if ($receta['dificultad'] === 'facil') echo 'selected';?> >Facil</option>
                        <option value="media" <?php if ($receta['dificultad'] === 'media') echo 'selected';?>  >Media</option>
                        <option value="compleja" <?php if ($receta['dificultad'] === 'compleja') echo 'selected';?>  >Compleja</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="texto">Texto:</label>
                    <input type="text" id="texto" name="texto" value = "<?php echo $receta ['texto'] ; ?>" required>
                </div>

                <!--
                    Actualizar foto

                <div class="form-group">
                    <label for="imagen">Imagen:</label>
                    <input type="file" id="imagen" name="imagen" value = "<?php echo $receta ['imagen'] ; ?>" required>
                </div>
               
                -->
                
              
                <button type="submit">Iniciar</button>
            </form>
         
        
    </div>
</body>
</html>