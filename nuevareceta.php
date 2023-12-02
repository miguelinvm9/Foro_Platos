<?php
session_start();
include 'conectaDatabase.php';

function insertarReceta($nombre, $tiempo, $dificultad, $texto, $fecha, $imagen, $id_usuario) {
    global $conexion;
    $sql = "INSERT INTO receta (id,nombre,tiempo,dificultad,texto,fecha,imagen,id_usuario) 
                VALUES (0,:nombre, :tiempo, :dificultad, :texto, :fecha, :imagen, :usuario)";
    $stmt = $conexion->prepare($sql);
    $stmt->bindParam(':nombre', $nombre);
    $stmt->bindParam(':tiempo', $tiempo);
    $stmt->bindParam(':dificultad', $dificultad);
    $stmt->bindParam(':texto', $texto);
    $stmt->bindParam(':fecha', $fecha);
    $stmt->bindParam(':imagen', $imagen);
    $stmt->bindParam(':usuario', $id_usuario);
    return $stmt->execute();
}

$consulta_ingredientes = $conexion->query("SELECT id, nombre FROM ingrediente");


//insertarReceta("RECETA DE PRUEB FUNCION",60,"compleja","RECETA FUNCION",date("Y-m-d H:i:s"),"default.jpg",$_SESSION['id_usuario']);
if(isset($_POST['button-blue'])){
    $carpeta_destino = "fotos_recetas/";
    $nombre_imagen = "receta_".uniqid().".jpg";
    $ruta_imagen = $carpeta_destino.$nombre_imagen;

    move_uploaded_file($_FILES["imagen"]["tmp_name"], $ruta_imagen);

    $ingredientes = isset($_POST['ingredientes']) ? $_POST['ingredientes'] : [];
    insertarReceta($_POST["nombre"], $_POST["tiempo"],$_POST["dificultad"],$_POST['comments'], date("Y-m-d H:i:s"),$nombre_imagen,$_SESSION['id_usuario']);
    $id_ultima_receta = $conexion->lastInsertId();
    if(!empty($ingredientes)){
        foreach ($ingredientes as $id_ingrediente){
            $insertar_ingrediente = $conexion->prepare("INSERT INTO receta_ingrediente (id_receta, id_ingrediente) VALUES (?, ?)");
            $insertar_ingrediente->execute([$id_ultima_receta, $id_ingrediente]);
        }
    }
}
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
    <h1>CREAR RECETA</h1>
    <div id="form-main">
        <div id="form-div">
            <form class="form" id="form1" method="post" enctype="multipart/form-data">
                <input name="nombre" type="text" class="feedback-input" placeholder="NOMBRE" id="NOMBRE" required/>
                <input name="tiempo" type="text" class="feedback-input" placeholder="tiempo" id="tiempo" required/>
                <select name="dificultad" id="dificultad" class="feedback-input">
                    <option value="">DIFICULTAD</option>
                    <option value="facil">FACIL</option>
                    <option value="media">MEDIO</option>
                    <option value="compleja">COMPLEJA</option>
                </select>
                <textarea class="feedback-input" cols="35" rows="12" name="comments" id="para1"></textarea>
                <br>
                <label>Ingredientes:</label><br>
                <div id="ingredientes-container">
                    <div class="ingrediente">
                        <input type="text" name="ingredientes[]" placeholder="Nombre del ingrediente" required>
                        <button type="button" onclick="eliminarIngrediente(this)">Eliminar</button>
                    </div>
                </div>
                <button type="button" onclick="agregarIngrediente()">Agregar Ingrediente</button>

                <br>
                <input type="file" class="feedback-input" id="imagen" name="imagen" required>               
                <div class="submit">
                    <input type="submit" value="INSERTAR RECETA" id="button-blue" name="button-blue"/>
                    <div class="ease"></div>
                </div>
                </div>
            </form>
        </div>
    </div>


    <script>
        function agregarIngrediente() {
            const contenedor = document.getElementById('ingredientes-container');
            const nuevoIngrediente = document.createElement('div');
            nuevoIngrediente.innerHTML = `
                <input type="text" name="ingredientes[]" placeholder="Nombre del ingrediente" required>
                <button type="button" onclick="eliminarIngrediente(this)">Eliminar</button>
            `;
            contenedor.appendChild(nuevoIngrediente);
        }

        function eliminarIngrediente(botonEliminar) {
            const contenedor = document.getElementById('ingredientes-container');
            contenedor.removeChild(botonEliminar.parentNode);
        }
    </script>



<!--
function agregarIngrediente() {
  $contenedor = document.getElementById('ingredientes-container');
  $nuevoIngrediente = document.createElement('div');
  $nuevoIngrediente->innerHTML = '
    <input type="text" name="ingredientes[]" placeholder="Nombre del ingrediente" required>
    <button type="button" onclick="eliminarIngrediente(this)">Eliminar</button>
  ';
  $contenedor->appendChild($nuevoIngrediente);
}

function eliminarIngrediente($botonEliminar) {
  $contenedor = document.getElementById('ingredientes-container');
  $contenedor->removeChild($botonEliminar->parentNode);
}

?> -->


    
</body>
</html>
