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
                <li><a href="index.php">Inicio</a></li>
                <li><a href="recetas.php">Recetas</a></li>
                <li><a href="cerrarSesion.php">Cerrar Sesión</a></li>
                <?php if($_SESSION['esAdmin']==1){
                    print '<li><a href="verPerfil.php">Ver Usuarios</a></li>';
                    print '<li><a href="recetasAdmin.php">Ver Recetas</a></li>';
                }
                ?>
                <li><a href="MiPerfil.php">Mi Perfil</a></li>
                <li><a href="baja_usuario.php">DARSE DE BAJA</a></li>
            </ul>
        </nav>
    <?php 
    } else {
    ?>
        <nav>
            <ul>
                <li><a href="index.php">Inicio</a></li>
                <li><a href="recetas.php">Recetas</a></li>
                <li><a href="iniciar_sesion.html">Iniciar Sesión / Registrarse</a></li>
                <li><a href="MiPerfil.php">Mi Perfil</a></li>
            </ul>
        </nav>
    <?php
    }
?>