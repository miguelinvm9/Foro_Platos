<?php
// Conectar a la base de datos (reemplaza con tus propias credenciales)
$servername = "localhost";
$username = "tu_usuario";  
$password = "tu_contraseña";
$dbname = "tu_base_de_datos";

$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar la conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Obtener el término de búsqueda desde el formulario
$searchTerm = $_POST['search'];

// Consulta SQL para buscar en la base de datos (reemplaza 'tu_tabla' y 'campo_busqueda' con los nombres reales)
$sql = "SELECT * FROM tu_tabla WHERE campo_busqueda LIKE '%$searchTerm%'";
$result = $conn->query($sql);

// Mostrar los resultados de la búsqueda
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo "ID: " . $row["id"] . " - Nombre: " . $row["nombre"] . "<br>";
    }
} else {
    echo "No se encontraron resultados.";
}

// Cerrar la conexión
$conn->close();
?>
