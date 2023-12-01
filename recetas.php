<?php
session_start();
include 'conectaDatabase.php';

// Configuración de paginación
$recetasPorPagina = 5;
$paginaActual = isset($_GET['pagina']) ? (int)$_GET['pagina'] : 1;
$inicio = ($paginaActual - 1) * $recetasPorPagina;

// Consulta para obtener el total de recetas
$totalRecetas = $conexion->query("SELECT COUNT(*) as total FROM receta")->fetchColumn();

// Calcular el total de páginas
$totalPaginas = ceil($totalRecetas / $recetasPorPagina);

// Consulta para obtener las recetas de la página actual
$consulta = $conexion->prepare("SELECT * FROM receta LIMIT :inicio, :recetasPorPagina");
$consulta->bindParam(':inicio', $inicio, PDO::PARAM_INT);
$consulta->bindParam(':recetasPorPagina', $recetasPorPagina, PDO::PARAM_INT);
$consulta->execute();
$vRecetas = $consulta->fetchAll(PDO::FETCH_ASSOC);

?>
<!DOCTYPE html>
<html>
<head>
    <title>MIS RECETAS</title>
    <link rel="stylesheet" type="text/css" href="recetas/recetas.css">
    <link rel="icon" sizes="64x64" href="img/descarga.jpg">
</head>
<body>
<?php include('includes/navbar.php'); ?>
<h1>MIS RECETAS</h1>
<a href="insertarReceta.html">
    <div class="button_plus"></div>
</a>
<table class="table table-bordered">
    <?php
    foreach ($vRecetas as $receta) {
        echo '<tr>';
        echo '<td ><img src="fotos_recetas/' . $receta['imagen'] . '"></td>';
        echo '<td >' . $receta['nombre'] . '</td>';
        echo '<td >' . $receta['tiempo'] . '</td>';
        echo '<td >' . $receta['dificultad'] . '</td>';
        echo '<td >' . $receta['texto'] . '</td>';
        echo '<td >' . $receta['fecha'] . '</td>';
        echo '<td >' . $receta['id_usuario'] . '</td>';
        echo '<td ><a href="receta.php?id_receta=' . $receta['id'] . '">VER RECETA</a></td>';
        echo ' </tr>';
    }
    ?>
</table>

<!-- Paginación -->
<div class="paginacion">
    <?php if ($paginaActual > 1): ?>
        <a href="?pagina=<?php echo $paginaActual - 1; ?>" class="boton-paginacion">Página Anterior</a>
    <?php endif; ?>

    <?php for ($i = 1; $i <= $totalPaginas; $i++): ?>
        <a href="?pagina=<?php echo $i; ?>" class="boton-paginacion <?php echo ($i == $paginaActual) ? 'active' : ''; ?>"><?php echo $i; ?></a>
    <?php endfor; ?>

    <?php if ($paginaActual < $totalPaginas): ?>
        <a href="?pagina=<?php echo $paginaActual + 1; ?>" class="boton-paginacion">Página Siguiente</a>
    <?php endif; ?>
</div>

</body>
</html>
