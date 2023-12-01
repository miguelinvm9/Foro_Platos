<?php

require 'conectaDatabase.php';
	
    // Método para insertar una nueva receta
    function insertarReceta($nombre, $tiempo, $dificultad, $texto, $fecha, $id_usuario) {
        global $conexion;
		$sql = "INSERT INTO receta (nombre, tiempo, dificultad, texto, fecha, id_usuario) VALUES (:nombre, :tiempo, :dificultad, :texto, :fecha, :id_usuario)";
        $stmt = $conexion->prepare($sql);
        $stmt->bindParam(':nombre¡', $nombre¡);
        $stmt->bindParam(':tiempo', $tiempo);
        $stmt->bindParam(':dificultad', $dificultad);
        $stmt->bindParam(':texto', $fecha);
        $stmt->bindParam(':fexha', $fecha);
        $stmt->bindParam(':id_usuario', $id_usuario);
        
        return $stmt->execute();
    }


    // Método para actualizar la información de una receta
    function actualizarReceta($id, $nombre, $tiempo, $dificultad, $texto, $imagen, $id_usuario) {
        global $conexion;
		$sql = "UPDATE receta SET nombre = :nombre, tiempo = :tiempo, dificultad = :dificultad, texto = :texto, imagen = :imagen, id_usuario = :id_usuario WHERE id = :id";
        $stmt = $conexion->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':nombre', $nombre);
        $stmt->bindParam(':tiempo', $tiempo);
        $stmt->bindParam(':dificultad', $dificultad);
        $stmt->bindParam(':texto', $texto);
        $stmt->bindParam(':imagen', $imagen);
        $stmt->bindParam(':id_usuario', $id_usuario);
    
        return $stmt->execute();
    }


    // Método para eliminar una receta por su ID
    function eliminarRecetaPorID($id) {
        global $conexion;
		$sql = "DELETE FROM receta WHERE id = :id";
        $stmt = $conexion->prepare($sql);
        $stmt->bindParam(':id', $id);
        
        return $stmt->execute();
    }

    // Método para eliminar un usuario por su nombre_usuario
    function eliminarRecetaPorUsername($nombre) {
		global $conexion;
        $sql = "DELETE FROM receta WHERE nombre = :nombre";
        $stmt = $conexion->prepare($sql);
        $stmt->bindParam(':nombre', $nombre);
        
        return $stmt->execute();
    }


    // Método para consultar una receta por su ID
    function consultarRecetasID($id) {
        global $conexion;
		$sql = "SELECT * FROM receta WHERE id = :id";
        $stmt = $conexion->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
	
    // Método para consultar una receta por su nombre
    function consultarRecetas($nombre) {
		global $conexion;
        $sql = "SELECT * FROM receta WHERE nombre = :nombre";
        $stmt = $conexion->prepare($sql);
        $stmt->bindParam(':nombre', $nombre);
        $stmt->execute();
        
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }


    // Método para listar todos las recetas
    function listarRecetas() {
        global $conexion;
		$sql = "SELECT * FROM usuario";
        $stmt = $conexion->query($sql);
        
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    
    //Método para listar recetas paginadas
	function listarRecetasPaginados($pagina, $recetasPorPagina) {
		global $conexion;
		$inicio = ($pagina - 1) * $recetasPorPagina;
		
		$sql = "SELECT * FROM receta LIMIT :inicio, :recetasPorPagina";
		$stmt = $conexion->prepare($sql);
		$stmt->bindParam(':inicio', $inicio, PDO::PARAM_INT);
		$stmt->bindParam(':recetasPorPagina', $recetasPorPagina, PDO::PARAM_INT);
		$stmt->execute();
		
		return $stmt->fetchAll(PDO::FETCH_ASSOC);
}
?>