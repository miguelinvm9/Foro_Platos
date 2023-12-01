<?php
include 'conectarDataBase.php';
$sql ='SELECT * FROM usuarios';
$resultado=$mysqli->query($sql);
while(!is_null($fila=$mysqli->mysqli_fetch_assoc)($resultado));

?>



<!--
    /* Prepared statement, stage 1: prepare */
$stmt = $mysqli->prepare("INSERT INTO test(id, label) VALUES (?, ?)");

/* Prepared statement, stage 2: bind and execute */
$id = 1;
$label = 'PHP';
$stmt->bind_param("is", $id, $label); // "is" means that $id is bound as an integer and $label as a string 


O con hacer con PDO
-->