<?php
session_start();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Foro de Platos</title>
    <link rel="stylesheet" type="text/css" href="estilo_index.css">
    <link rel="icon" sizes="64x64" href="img/descarga.jpg">
</head>
<body>
<?php include('includes/navbar.php'); ?>
    <section class="forum-intro">
        <h2>Recetas Más Destacadas </h2>


       <!--<div class="gallery">
            <div class="photo">
                <img src="img/paella.jpg" alt="Foto 1">
                <div class="caption">Foto 1</div>
            </div>
            <div class="photo">
                <img src="imagen2.jpg" alt="Foto 2">
                <div class="caption">Foto 2</div>
            </div>
            <div class="photo">
                <img src="imagen3.jpg" alt="Foto 3">
                <div class="caption">Foto 3</div>
            </div>
            <div class="photo">
                <img src="imagen3.jpg" alt="Foto 3">
                <div class="caption">Foto 3</div>
            </div>--> 

           
    <div class="product-gallery">
        <div class="product">
            <div class="image-container">
                <img src="img/paella.jpg" alt="Producto 1">
            </div>
            <h3>Paella</h3>
            <button  type="submit">Ver +</button>
        </div>
        <div class="product">
            <div class="image-container">
                <img src="img/tacos.jpg" alt="Producto 2">
            </div>
            <h3>Tacos</h3>
            <button href="recetas.php"type="submit">Ver +</button>
        </div>
        <div class="product">
            <div class="image-container">
                <img src="img/creps.jpg" alt="Producto 3">
            </div>
            <h3>Creps Chocolate</h3>
            <button type="submit">Ver +</button>
        </div>

            <!---->
    
        <!-- Aquí puedes mostrar tus resultados de búsqueda -->
    </div>

    </section>

    <footer>
        <p>&copy; 2023 Foro Platos</p>
    </footer>
    <link src="estilo_carrusel.js">
    
</body>
</html>
