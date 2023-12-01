<?php
session_start();
include 'conectaDatabase.php';
$recetas=$conexion->query("SELECT * FROM receta");
$vRecetas=$recetas->fetchAll(PDO::FETCH_ASSOC);

?>
<!DOCTYPE html>
<html>
<head>
    <title>MIS RECETAS</title>
    <link rel="stylesheet" type="text/css" href="recetas/recetas.css" >
    <link rel="icon" sizes="64x64" href="img/descarga.jpg">
</head>
<body>
<?php include('includes/navbar.php'); ?>
    <h1>MIS RECETAS</h1>
    <a href="nuevareceta.php">
        <div class="button_plus"></div>
    </a>
    <table   class="table table-bordered">
        <th class="bg-primary" scope="col">FOTO</th>
        <th class="bg-primary" scope="col">RECETA</th>
        <th class="bg-primary" scope="col">TIEMPO</th>
        <th class="bg-primary" scope="col">DIFICULTAD</th>
        <th class="bg-primary" scope="col">DESCRIPCIÓN</th>
        <th class="bg-primary" scope="col">FECHA</th>
        <th class="bg-primary" scope="col">ID USUARIO</th>
        <th class="bg-primary" scope="col">VER RECETA</th>
        <th class="bg-primary" scope="col">EDITAR RECETA</th>
        <th class="bg-primary" scope="col">ELIMINAR RECETA</th>

    <?php
    foreach ($vRecetas as $receta) {
            echo '<tr>';
                echo '<td ><img src="fotos_recetas/'. $receta['imagen'] . '"></td>';
                echo '<td >' . $receta['nombre'] . '</td>';
                echo '<td >' . $receta['tiempo'] . '</td>';
                echo '<td >' . $receta['dificultad'] . '</td>';
                echo '<td >' . $receta['texto'] . '</td>';
                echo '<td >' . $receta['fecha'] . '</td>';
                echo '<td >' . $receta['id_usuario'] . '</td>';
                echo '<td ><a href="recetaAdmin.php?id_receta='.$receta['id'].'">VER RECETA</a></td>';
                echo '<td ><a href="editarReceta.php?id_receta='.$receta['id'].'">Editar RECETA</a></td>';
                echo '<td ><a href="eliminarReceta.php?id_receta='.$receta['id'].'">Eliminar RECETA</a></td>';
                
            echo ' </tr>';
        }
        ?>
    </table>
</body>
</html>
