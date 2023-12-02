<?php
session_start();
include 'conectaDatabase.php';

try {
    // Obtener los datos del formulario
    $nombre_receta = $_POST['nombre_receta'];
    $tiempo = $_POST['tiempo'];
    $dificultad = $_POST['dificultad'];
    $descripcion = $_POST['descripcion'];
    $ingredientes = isset($_POST['ingredientes']) ? $_POST['ingredientes'] : [];

    // Subir la imagen
    $carpeta_destino = "fotos_recetas/";
    $nombre_imagen = "receta_" . uniqid() . ".jpg"; // Puedes generar un nombre único para evitar conflictos de nombres
    $ruta_imagen = $carpeta_destino . $nombre_imagen;

    move_uploaded_file($_FILES["imagen"]["tmp_name"], $ruta_imagen);

    // Insertar la receta en la tabla 'receta'
    $insertar_receta = $conexion->prepare("INSERT INTO receta (id,nombre,tiempo,dificultad,texto,fecha,imagen,id_usuario) VALUES (?,?, ?, ?, ?, ?, ?, ?)");
    $insertar_receta->execute([0,$nombre_receta, $tiempo, $dificultad, $descripcion,date("Y-m-d H:i:s"), $nombre_imagen,$_SESSION['id_usuario']]);

    $id_receta = $conexion->lastInsertId(); // Obtener el ID de la receta recién insertada

    // Insertar los ingredientes seleccionados o nuevos en la tabla 'ingredientes_receta' 
    if (!empty($ingredientes)) {
        foreach ($ingredientes as $nombre_ingrediente) {
            // Verificar si el ingrediente ya existe en la base de datos
            $consulta_existencia = $conexion->prepare("SELECT id FROM ingrediente WHERE nombre = ?");
            $consulta_existencia->execute([$nombre_ingrediente]);
            $resultado_existencia = $consulta_existencia->fetch(PDO::FETCH_ASSOC);

            if ($resultado_existencia) {
                // Si el ingrediente existe, solo obtenemos su ID
                $id_ingrediente = $resultado_existencia['id'];
            } else {
                // Si el ingrediente no existe, lo insertamos y obtenemos su nuevo ID
                $insertar_ingrediente = $conexion->prepare("INSERT INTO ingrediente (nombre) VALUES (?)");
                $insertar_ingrediente->execute([$nombre_ingrediente]);
                $id_ingrediente = $conexion->lastInsertId();
            }

            // Insertar en la tabla 'ingredientes_receta'
            $insertar_ingrediente_receta = $conexion->prepare("INSERT INTO receta_ingrediente (id_receta, id_ingrediente) VALUES (?, ?)");
            $insertar_ingrediente_receta->execute([$id_receta, $id_ingrediente]);
        }
    }

    // Redirigir al usuario a una página de éxito o mostrar un mensaje de éxito
    header("Location: insertarReceta.html");

} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}

?>