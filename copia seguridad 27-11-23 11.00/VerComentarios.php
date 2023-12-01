<?php
// Este archivo se incluye para cargar los comentarios existentes

$commentsFile = 'comments.txt';

if (file_exists($commentsFile)) {
    $comments = file($commentsFile, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

    if ($comments) {
        echo '<table>';
        echo '<tr><th>Nombre</th><th>Comentario</th></tr>';
        foreach ($comments as $comment) {
            list($name, $commentText) = explode(':', $comment, 2);
            echo "<tr><td>$name</td><td>$commentText</td></tr>";
        }
        echo '</table>';
    } else {
        echo '<p>No hay comentarios todavía.</p>';
    }
} else {
    echo '<p>No hay comentarios todavía.</p>';
}
?>

<?php
// Este archivo se encarga de guardar los nuevos comentarios

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $comment = $_POST['comment'];

    if ($name && $comment) {
        $newComment = "<strong>$name:</strong> $comment";

        $commentsFile = 'comments.txt';
        file_put_contents($commentsFile, $newComment . PHP_EOL, FILE_APPEND | LOCK_EX);
    }
}

// Redirigir para evitar que el formulario se envíe nuevamente si se actualiza la página
header('Location: index.php');
exit;
?>

