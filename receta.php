<?php
session_start();
include 'conectaDatabase.php';
$id_receta = $_GET["id_receta"];
$recetas=$conexion->query("SELECT * FROM receta WHERE id=$id_receta");
$vRecetas=$recetas->fetchAll(PDO::FETCH_ASSOC);
/*
    DATOS EXISTENTES O AUTOMATICOS:
    ID	TEXTO ID_RECETA ID_USUARIO	FECHA id_comentario
    ID = AUTO INCREMENTAL
    TEXTO = $_POST['comentario'];
    $id_receta = $_GET["id_receta"];
    ID USUARIO = $_SESSION['id_usuario']
    FECHA = date("Y-m-d H:i:s");
*/

function insertarComentario($comentario, $id_receta, $id_usuario, $fecha) {
    global $conexion;
    $sql = "INSERT INTO comentario (id,texto,id_receta,id_usuario,fecha,id_comentario) 
                VALUES (0,:texto, :id_receta, :id_usuario, :fecha, NULL)";
    $stmt = $conexion->prepare($sql);
    $stmt->bindParam(':texto', $comentario);
    $stmt->bindParam(':id_receta', $id_receta);
    $stmt->bindParam(':id_usuario', $id_usuario);
    $stmt->bindParam(':fecha', $fecha);
    
    return $stmt->execute();
}

function insertarValoracion($id_receta, $id_usuario, $nota) {
    global $conexion;
    $sql = "INSERT INTO valoracion_receta (id_valoracion,id_receta,id_usuario,nota) 
                VALUES (0, :id_receta, :id_usuario, :nota)";
    $stmt = $conexion->prepare($sql);
    $stmt->bindParam(':id_receta', $id_receta);
    $stmt->bindParam(':id_usuario', $id_usuario);
    $stmt->bindParam(':nota', $nota);
    
    return $stmt->execute();
}

function comprobarValoracion($id_usuario,$id_receta) {
    global $conexion;
    $consulta = $conexion->prepare("SELECT COUNT(*) as total FROM valoracion_receta WHERE id_usuario = ? AND id_receta = ?");
    $consulta->execute([$id_usuario, $id_receta]);
    // Obtener el resultado
    $resultado = $consulta->fetch(PDO::FETCH_ASSOC);

    // Verificar si el usuario ha comentado la receta
    return ($resultado['total'] > 0);
}


function obtenerValoracionUsuario($idUsuario, $idReceta) {
    global $conexion;
    $consulta = $conexion->prepare("SELECT nota FROM valoracion_receta WHERE id_usuario = ? AND id_receta = ?");
    $consulta->execute([$idUsuario, $idReceta]);

    // Obtener el resultado
    $valoracion = $consulta->fetch(PDO::FETCH_COLUMN);

    return $valoracion;
}

$valoracionUsuario = obtenerValoracionUsuario($_SESSION['id_usuario'], $_GET["id_receta"]);



function obtenerValoracionReceta($id_usuario,$id_receta) {
    global $conexion;
    $consulta = $conexion->prepare("SELECT COUNT(*) as total FROM valoracion_receta WHERE id_usuario = ? AND id_receta = ?");
    $consulta->execute([$id_usuario, $id_receta]);
    // Obtener el resultado
    $resultado = $consulta->fetch(PDO::FETCH_ASSOC);

    // Verificar si el usuario ha comentado la receta
    return ($resultado['total'] > 0);
}

function obtenerValoracionRecetaMedia($id_receta) {
    global $conexion;
    $consulta = $conexion->prepare("SELECT AVG(nota) as media FROM valoracion_receta WHERE id_receta = ?");
    $consulta->execute([$id_receta]);
    // Obtener el resultado
    $media = $consulta->fetch(PDO::FETCH_ASSOC);

    // Verificar si el usuario ha comentado la receta
    return $media['media'];
}

$valoracionMediaReceta = obtenerValoracionRecetaMedia($_GET["id_receta"]);


//insertarComentario("PRUEBA FUNCION INSERT", $_GET["id_receta"], $_SESSION['id_usuario'], date("Y-m-d H:i:s"));

if(isset($_POST['comentar'])){
    insertarComentario($_POST['comentario'], $_GET["id_receta"], $_SESSION['id_usuario'], date("Y-m-d H:i:s"));
}

if(isset($_POST['valorar'])){
    insertarValoracion($_GET["id_receta"], $_SESSION['id_usuario'], $_POST['valoracion']);
}

$comentarios=$conexion->query("SELECT * FROM comentario WHERE id_receta=$id_receta");
$vComentarios=$comentarios->fetchAll(PDO::FETCH_ASSOC);

$ingrediente=$conexion->query("SELECT i.nombre
                                    FROM receta_ingrediente r, ingrediente i
                                        WHERE r.id_ingrediente = i.id
                                            AND id_receta=$id_receta");
$vIngrediente=$ingrediente->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html>
<head>
    <title>LA RECETA</title>
    <link rel="stylesheet" type="text/css" href="recetas/recetas.css" >
    <link rel="icon" sizes="64x64" href="img/descarga.jpg">
</head>
<body>
<?php include('includes/navbar.php'); ?>
    <h1> RECETA FORO - <?php echo $valoracionMediaReceta; ?></h1>
    <table   class="table table-bordered">
        <th class="bg-primary" scope="col">FOTO</th>
        <th class="bg-primary" scope="col">RECETA</th>
        <th class="bg-primary" scope="col">TIEMPO</th>
        <th class="bg-primary" scope="col">DIFICULTAD</th>
        <th class="bg-primary" scope="col">DESCRIPCIÓN</th>
        <th class="bg-primary" scope="col">FECHA</th>
        <th class="bg-primary" scope="col">ID USUARIO</th>

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
            echo ' </tr>';
        }
        ?>
    </table>

    <h1>LOS COMENTARIOS</h1>
    <?php
    if(isset($_SESSION['id_usuario'])){ 
    ?>
    <center>
        <form action="" method="post" style="width:50%">
            <label for="comentario">Comentario:</label>
            <textarea id="comentario" name="comentario" rows="4" required></textarea>
            <input type="submit" name="comentar"/>
        </form>
    </center>
    <?php } ?>

    <table   class="table table-bordered">
        <th class="bg-primary" scope="col">ID</th>
        <th class="bg-primary" scope="col">TEXTO</th>
        <th class="bg-primary" scope="col">ID_USUARIO</th>
        <th class="bg-primary" scope="col">FECHA</th>

    <?php
    foreach ($vComentarios as $comentario) {
            echo '<tr>';
                echo '<td >' . $comentario['id'] . '</td>';
                echo '<td >' . $comentario['texto'] . '</td>';
                echo '<td >' . $comentario['id_usuario'] . '</td>';
                echo '<td >' . $comentario['fecha'] . '</td>';
            echo ' </tr>';
        }
        ?>
    </table>

    <h1>VALORACION</h1>
    
    <?php
    if(isset($_SESSION['id_usuario'])){
        if ($valoracionUsuario !== false) {
            ?>
            <center>
                <p style="color:white;font-weight:bold">El usuario ha valorado la receta con <?php echo $valoracionUsuario; ?> estrellas.</p>
            </center>
            <?php
        } else {
            ?>
            <center>
                <form action="" method="post" style="width:50%">
                    <label for="valoracion">VALORACION:</label>
                    <input type="text" id="valoracion" name="valoracion" required/>
                    <input type="submit" name="valorar"/>
                </form>
            </center>
        <?php
        }
    }
    ?>


    <h1>LOS INGREDIENTES</h1>
    <table   class="table table-bordered">
        <th class="bg-primary" scope="col">INGREDIENTE</th>
    <?php
    foreach ($vIngrediente as $ingrediente) {
        echo '<tr>';
            echo '<td >' . $ingrediente['nombre'] . '</td>';
        echo ' </tr>';
    }
    ?>
    </table>
    <br><br>
</body>
</html>

