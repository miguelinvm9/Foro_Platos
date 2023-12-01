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
    <header>
        <!--<h1>Bienvenido al Foro Platos</h1>--> 
        <!--<p>Únete a la conversación sobre diversos temas.</p>--> 
        <!--Slide de imágenes-->
        <div class="slider-container">
        <div class="slider position"></div>
    </div>
    </header>
    <?php
    if(isset($_SESSION['esAdmin'])){ ?>
        <nav>
            <ul>
                <li><a href="#">Inicio</a></li>
                <li><a href="recetas/recetas.html">Recetas</a></li>
                <li><a href="cerrarSesion.php">Cerrar Sesión</a></li>
                <?php if($_SESSION['esAdmin']==1){
                    print '<li><a href="verPerfil.php">Ver Usuarios</a></li>';
                }
                ?>
                <li><a href="MiPerfil.php">Mi Perfil</a></li>
            </ul>
        </nav>
    <?php 
    } else {
    ?>
        <nav>
            <ul>
                <li><a href="#">Inicio</a></li>
                <li><a href="recetas/recetas.html">Recetas</a></li>
                <li><a href="iniciar_sesion.html">Iniciar Sesión / Registrarse</a></li>
                <li><a href="MiPerfil.php">Mi Perfil</a></li>
                
            </ul>
        </nav>
    <?php
    }
?>
    <section class="forum-intro">
        <h2>Galería de Recetas </h2>


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
            <button type="submit">Ver +</button>
        </div>
        <div class="product">
            <div class="image-container">
                <img src="img/tacos.jpg" alt="Producto 2">
            </div>
            <h3>Tacos</h3>
            <button type="submit">Ver +</button>
        </div>
        <div class="product">
            <div class="image-container">
                <img src="img/creps.jpg" alt="Producto 3">
            </div>
            <h3>Creps Chocolate</h3>
            <button type="submit">Ver +</button>
        </div>

    </section>

    <footer>
        <p>&copy; 2023 Foro Platos</p>
    </footer>
    <link src="estilo_carrusel.js">
    
</body>
</html>
