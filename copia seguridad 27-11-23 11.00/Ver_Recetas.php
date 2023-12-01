<?php

include 'conectaDatabase.php';
$recetas=$conexion->query("SELECT * FROM receta");
$vRecetas=$recetas->fetchAll(PDO::FETCH_ASSOC);

?>
<!DOCTYPE html>
<html>
<head>
    <title>Mi Tabla de Imágenes</title>
    <link rel="stylesheet" type="text/css" href="recetas/recetas.css" >
    <link rel="icon" sizes="64x64" href="img/descarga.jpg">
</head>
<body>
    <h1>Mi Tabla de Imágenes</h1>
    <table   class="table table-bordered">
        <th class="bg-primary" scope="col">FOTO</th>
        <th class="bg-primary" scope="col">RECETA</th>
        <th class="bg-primary" scope="col">TIEMPO</th>
        <th class="bg-primary" scope="col">DIFICULTAD</th>
        <th class="bg-primary" scope="col">DESCRIPCIÓN</th>
        <th class="bg-primary" scope="col">FECHA</th>
        <th class="bg-primary" scope="col">ID USUARIO</th>
        <th class="bg-primary" scope="col">VER RECETA</th>
    <?php
    foreach ($vRecetas as $receta) {
            echo '<tr>';
                echo '<td ><img src="recetas/img_recetas/'. $receta['imagen'] . '"></td>';
                echo '<td >' . $receta['nombre'] . '</td>';
                echo '<td >' . $receta['tiempo'] . '</td>';
                echo '<td >' . $receta['dificultad'] . '</td>';
                echo '<td >' . $receta['texto'] . '</td>';
                echo '<td >' . $receta['fecha'] . '</td>';
                echo '<td >' . $receta['id_usuario'] . '</td>';
                echo '<td ><a href="ver_receta.php?id_receta='.$receta['id'].'">VER RECETA</a></td>';
            echo ' </tr>';
        }
        ?>
    </table>
</body>
</html>
