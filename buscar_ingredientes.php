<?php
include 'conectaDatabase.php';
try {
    // Obtener el texto ingresado por el usuario desde la solicitud AJAX
    $textoIngresado = $_GET['texto'] ?? '';

    // Buscar ingredientes en la base de datos que coincidan con el texto ingresado
    $consulta = $conexion->prepare("SELECT nombre FROM ingrediente WHERE nombre LIKE ? LIMIT 10");
    $consulta->execute(["%$textoIngresado%"]);
    $resultados = $consulta->fetchAll(PDO::FETCH_ASSOC);

    // Devolver los resultados en formato JSON
    echo json_encode($resultados);
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
?>