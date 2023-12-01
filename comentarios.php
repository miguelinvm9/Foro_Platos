<?php

include 'conectaDatabase.php';
$comentarios=$conexion->query("SELECT * FROM comentario");
$vComentarios=$comentarios->fetchAll(PDO::FETCH_ASSOC);

?>
<!DOCTYPE html>
<html>
<head>
    <title>Mi Tabla de comentarios</title>
    <link rel="stylesheet" type="text/css" href="recetas/recetas.css" >
    <link rel="icon" sizes="64x64" href="img/descarga.jpg">
</head>
<body>
    <h1>Mi Tabla de comentarios</h1>
    <table   class="table table-bordered">
        <th class="bg-primary" scope="col">ID</th>
        <th class="bg-primary" scope="col">TEXTO</th>
        <th class="bg-primary" scope="col">ID_RECETA</th>
        <th class="bg-primary" scope="col">ID_USUARIO</th>
        <th class="bg-primary" scope="col">FECHA</th>
        <th class="bg-primary" scope="col">ID COMENTARIO</th>

    <?php
    foreach ($vComentarios as $comentario) {
            echo '<tr>';
                echo '<td >' . $comentario['id'] . '</td>';
                echo '<td >' . $comentario['texto'] . '</td>';
                echo '<td >' . $comentario['id_receta'] . '</td>';
                echo '<td >' . $comentario['id_usuario'] . '</td>';
                echo '<td >' . $comentario['fecha'] . '</td>';
                echo '<td >' . $comentario['id_comentario'] . '</td>';
            echo ' </tr>';
        }
        ?>
    </table>
</body>
</html>
