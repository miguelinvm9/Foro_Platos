<?php

require 'conectaDatabase.php';
	
    // Método para insertar un nuevo ingrediente
    function insertarIngrediente($nombre, $alergenos) {
        global $conexion;
		$sql = "INSERT INTO ingrediente (nombre, alergenos, ) VALUES (:nombre, :alergenos)";
        $stmt = $conexion->prepare($sql);
        $stmt->bindParam(':nombre', $nombre);
        $stmt->bindParam(':alergenos', $alergenos);
        
        return $stmt->execute();
    } 

    // Método para actualizar la información de un ingrediente 
    function actualizarIngrdiente($id, $nombre, $alergenos) {
        global $conexion;
		$sql = "UPDATE ingrediente SET nombre = :nombre, alergeno = :alergeno WHERE id = :id";
        $stmt = $conexion->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':nombre', $nombre);
        $stmt->bindParam(':alergeno', $alergeno);
      
        return $stmt->execute();
    }

    // Método para eliminar un ingrediente por su ID
    function eliminaringredientePorID($id) {
        global $conexion;
		$sql = "DELETE FROM ingrediente WHERE id = :id";
        $stmt = $conexion->prepare($sql);
        $stmt->bindParam(':id', $id);
        
        return $stmt->execute();
    }

    // Método para eliminar un ingrediente por su nombre_usuario
    function eliminarIngredientePorUsername($nombre) {
		global $conexion;
        $sql = "DELETE FROM ingrediente WHERE nombre = :nombre";
        $stmt = $conexion->prepare($sql);
        $stmt->bindParam(':nombre', $nombre);
        
        return $stmt->execute();
    }

    // Método para consultar un  ingrediente por su ID
    function consultarIngredienteID($id) {
        global $conexion;
		$sql = "SELECT * FROM ingrediente WHERE id = :id";
        $stmt = $conexion->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // Método para consultar un ingrediente por su nombre_usuario
    function consultarIngrediente($nombre) {
		global $conexion;
        $sql = "SELECT * FROM ingrediente WHERE nombre = :nombre";
        $stmt = $conexion->prepare($sql);
        $stmt->bindParam(':nombre', $nombre);
        $stmt->execute();
        
        return $stmt->fetch(PDO::FETCH_ASSOC);
        
    }

    // Método para listar todos los ingredientes
    function listarIngredientes() {
        global $conexion;
		$sql = "SELECT * FROM ingrediente";
        $stmt = $conexion->query($sql);
        
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    //Método para listar usuarios paginados
	function listarIngredientesPaginados($pagina, $ingredientesPorP agina) {
		global $conexion;
		$inicio = ($pagina - 1) * $ingredientesPorPagina;
		
		$sql = "SELECT * FROM ingrediente LIMIT :inicio, :ingredientesPorPagina";
		$stmt = $conexion->prepare($sql);
		$stmt->bindParam(':inicio', $inicio, PDO::PARAM_INT);
		$stmt->bindParam(':ingredientesPorPagina', $uingredientesPorPagina, PDO::PARAM_INT);
		$stmt->execute();
		
		return $stmt->fetchAll(PDO::FETCH_ASSOC);
}
?>