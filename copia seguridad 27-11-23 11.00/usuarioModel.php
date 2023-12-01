<?php
	
	require '../UpdateUsuario/conectaDatabase.php';
	
    // Método para insertar un nuevo usuario
    function insertarUsuario($nombre_usuario,$nombre, $apellidos, $contrasena, $esAdmin, $correo, $experiencia, $etiqueta_usuario) {
        global $conexion;
		$sql = "INSERT INTO usuario (nombre_usuario,nombre, apellidos, contrasena, esAdmin, correo, experiencia, etiqueta_usuario) VALUES (:nombre_usuario,:nombre, :apellidos, :contrasena, :esAdmin, :correo, :experiencia, :etiqueta_usuario)";
        $stmt = $conexion->prepare($sql);
        $stmt->bindParam(':nombre_usuario', $nombre_usuario);
        $stmt->bindParam(':nombre', $nombre);
        $stmt->bindParam(':apellidos', $apellidos);
        $stmt->bindParam(':contrasena', $contrasena);
        $stmt->bindParam(':esAdmin', $esAdmin);
        $stmt->bindParam(':correo', $correo);
        $stmt->bindParam(':experiencia', $experiencia);
        $stmt->bindParam(':etiqueta_usuario', $etiqueta_usuario);
        
        return $stmt->execute();
    }

    // Método para actualizar la información de un usuario
    function actualizarUsuario($id, $nombre_usuario, $apellidos, $contrasena, $esAdmin, $correo, $experiencia, $etiqueta_usuario) {
        global $conexion;
		$sql = "UPDATE usuario SET nombre_usuario = :nombre_usuario, apellidos = :apellidos, contrasena = :contrasena, esAdmin = :esAdmin, correo = :correo, experiencia = :experiencia, etiqueta_usuario = :etiqueta_usuario WHERE id = :id";
        $stmt = $conexion->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':nombre_usuario', $nombre_usuario);
        $stmt->bindParam(':apellidos', $apellidos);
        $stmt->bindParam(':contrasena', $contrasena);
        $stmt->bindParam(':esAdmin', $esAdmin);
        $stmt->bindParam(':correo', $correo);
        $stmt->bindParam(':experiencia', $experiencia);
        $stmt->bindParam(':etiqueta_usuario', $etiqueta_usuario);
        
        return $stmt->execute();
    }

    // Método para eliminar un usuario por su ID
    function eliminarUsuarioPorID($id) {
        global $conexion;
		$sql = "DELETE FROM usuario WHERE id = :id";
        $stmt = $conexion->prepare($sql);
        $stmt->bindParam(':id', $id);
        
        return $stmt->execute();
    }
	
	// Método para eliminar un usuario por su nombre_usuario
    function eliminarUsuarioPorUsername($nombre_usuario) {
		global $conexion;
        $sql = "DELETE FROM usuario WHERE nombre_usuario = :nombre_usuario";
        $stmt = $conexion->prepare($sql);
        $stmt->bindParam(':nombre_usuario', $nombre_usuario);
        
        return $stmt->execute();
    }

    // Método para consultar un usuario por su ID
    function consultarUsuarioID($id) {
        global $conexion;
		$sql = "SELECT * FROM usuario WHERE id = :id";
        $stmt = $conexion->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
	
	// Método para consultar un usuario por su nombre_usuario
    function consultarUsuario($nombre_usuario) {
		global $conexion;
        $sql = "SELECT * FROM usuario WHERE nombre_usuario = :nombre_usuario";
        $stmt = $conexion->prepare($sql);
        $stmt->bindParam(':nombre_usuario', $nombre_usuario);
        $stmt->execute();
        
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // Método para listar todos los usuarios
    function listarUsuarios() {
        global $conexion;
		$sql = "SELECT * FROM usuario";
        $stmt = $conexion->query($sql);
        
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
	
	//Método para listar usuarios paginados
	function listarUsuariosPaginados($pagina, $usuariosPorPagina) {
		global $conexion;
		$inicio = ($pagina - 1) * $usuariosPorPagina;
		
		$sql = "SELECT * FROM usuario LIMIT :inicio, :usuariosPorPagina";
		$stmt = $conexion->prepare($sql);
		$stmt->bindParam(':inicio', $inicio, PDO::PARAM_INT);
		$stmt->bindParam(':usuariosPorPagina', $usuariosPorPagina, PDO::PARAM_INT);
		$stmt->execute();
		
		return $stmt->fetchAll(PDO::FETCH_ASSOC);
}
?>
