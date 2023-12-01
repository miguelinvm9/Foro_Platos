<?php

require 'conectaDatabase.php';
	
    // Método para insertar un nuevo comentario
    function insertarComentario($texto, $id_receta, $id_usuario, $id_comentario) {
        global $conexion;
		$sql = "INSERT INTO comentario (texto, id_receta, id_usuario, id_comentario) VALUES (:texto, :id_receta, :id_usuario, :id_comentario)";
        $stmt = $conexion->prepare($sql);
        $stmt->bindParam(':texto', $texto);
        $stmt->bindParam(':id_receta', $id_receta);
        $stmt->bindParam(':id_usuario', $id_usuario);
        $stmt->bindParam(':fecha', $fexha);
        $stmt->bindParam(':id_comenatario', $id_comentario);
        
        return $stmt->execute();
    }

    // Método para actualizar la información de un comentario
    function actualizarComentario($id, $texto, $id_receta, $id_usuario, $fecha, $id_comentario) {
        global $conexion;
		$sql = "UPDATE comentario SET texto = :texto, id_receta = :id_receta, id_usuario = :id_usuario, fecha = :fecha, id_comentario = :id_comentario WHERE id = :id";
        $stmt = $conexion->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':texto', $texto);
        $stmt->bindParam(':id_receta', $id_receta);
        $stmt->bindParam(':id_usuario', $id_usuario);
        $stmt->bindParam(':fecha', $fecha);
        $stmt->bindParam(':id_comentario', $id_comentario);
        
        return $stmt->execute();
    }


    // Método para eliminar un comentario por su ID
    function eliminarComentarioPorID($id) {
        global $conexion;
		$sql = "DELETE FROM comentario WHERE id = :id";
        $stmt = $conexion->prepare($sql);
        $stmt->bindParam(':id', $id);
        
        return $stmt->execute();
    }


    // Método para eliminar un comentario por su id_usuario
    function eliminarComentarioPorUsername($id_usuario) {
		global $conexion;
        $sql = "DELETE FROM comentario WHERE id_usuario = :id_usuario";
        $stmt = $conexion->prepare($sql);
        $stmt->bindParam(':id_usuario', $id_usuario);
        
        return $stmt->execute();
    }


     // Método para consultar un ucomentario por su id_receta
     function consultarComentarioID($texto) {
        global $conexion;
		$sql = "SELECT * FROM comentario WHERE id_receta = :id_receta";
        $stmt = $conexion->prepare($sql);
        $stmt->bindParam(':id_receta', $id_receta);
        $stmt->execute();
        
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
	
    // Método para consultar un comentario por su id_usuario
    function consultarComentario($id_usuario) {
		global $conexion;
        $sql = "SELECT * FROM comentario WHERE id_usuario = :id_usuario";
        $stmt = $conexion->prepare($sql);
        $stmt->bindParam(':id_usuario', $id_usuario);
        $stmt->execute();
        
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // Método para listar todos los comentarios
    function listarComentarios() {
        global $conexion;
		$sql = "SELECT * FROM comentario";
        $stmt = $conexion->query($sql);
        
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    //Método para listar comentarios paginados
	function listarComentariosPaginados($pagi na, $comentariosPorPagina) {
		global $conexion;
		$inicio = ($pagina - 1) * $comentariosPorPagina;
		
		$sql = "SELECT * FROM comentario LIMIT :inicio, :comentariosPorPagina";
		$stmt = $conexion->prepare($sql);
		$stmt->bindParam(':inicio', $inicio, PDO::PARAM_INT);
		$stmt->bindParam(':comentariosPorPagina', $comentariosPorPagina, PDO::PARAM_INT);
		$stmt->execute();
		
		return $stmt->fetchAll(PDO::FETCH_ASSOC);
}
?>