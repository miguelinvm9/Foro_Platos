<?php
// Inicia la sesión
session_start();

// Destruye todas las variables de sesión
session_destroy();

// Redirige a la página de inicio (puedes cambiar la URL a donde quieras redirigir)
header("Location: index.php");
exit();
?>
