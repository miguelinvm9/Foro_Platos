<?php session_start(); 
	$_SESSION['id']=2;
	$_SESSION['nombre_usuario']='Anika';
	$_SESSION['nombre']='Ana';
	$_SESSION['apellidos']='Perez Perez';
	$_SESSION['correo']='anika33@msn.org';
	$_SESSION['experiencia']='Experimentado';
	$_SESSION['etiqueta_usuario']=NULL;
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Modificar Usuario</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
        }

        .container {
            max-width: 400px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h2 {
            text-align: center;
        }

        form {
            text-align: left;
        }

        .form-group {
            margin-bottom: 20px;
        }

        label {
            display: block;
            font-weight: bold;
        }

        input[type="text"], input[type="password"], select {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        input[type="submit"] {
            background-color: #007bff;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Modificar Usuario</h2>
        <form action="actualizaUsuario.php" method="POST">
            <div class="form-group">
                <label for="nombre_usuario">Nombre de Usuario:</label>
                <input type="text" name="nombre_usuario" value="<?php echo $_SESSION['nombre_usuario']; ?>" required>
            </div>
            <div class="form-group">
                <label for="nombre">Nombre:</label>
                <input type="text" name="nombre" value="<?php echo $_SESSION['nombre']; ?>" required>
            </div>
            <div class="form-group">
                <label for="apellidos">Apellidos:</label>
                <input type="text" name="apellidos" value="<?php echo $_SESSION['apellidos']; ?>" required>
            </div>
            <div class="form-group">
                <label for="correo">Correo Electrónico:</label>
                <input type="text" name="correo" value="<?php echo $_SESSION['correo']; ?>" required>
            </div>
            <div class="form-group">
                <label for="experiencia">Experiencia:</label>
                <select name="experiencia" required>
                    <option value="Principiante" <?php if ($_SESSION['experiencia'] === 'Principiante') echo 'selected'; ?>>Principiante</option>
                    <option value="Amateur" <?php if ($_SESSION['experiencia'] === 'Amateur') echo 'selected'; ?>>Amateur</option>
                    <option value="Experimentado" <?php if ($_SESSION['experiencia'] === 'Experimentado') echo 'selected'; ?>>Experimentado</option>
                    <option value="Profesional principiante" <?php if ($_SESSION['experiencia'] === 'Profesional principiante') echo 'selected'; ?>>Profesional principiante</option>
					<option value="Profesional experimentado" <?php if ($_SESSION['experiencia'] === 'Profesional experimentado') echo 'selected'; ?>>Profesional experimentado</option>
                </select>
            </div>
            <div class="form-group">
                <label for="etiqueta_usuario">Etiqueta de Usuario:</label>
                <input type="text" name="etiqueta_usuario" value="<?php echo $_SESSION['etiqueta_usuario']; ?>">
            </div>
            <input type="submit" value="Guardar Cambios">
        </form>
    </div>
</body>
</html>
