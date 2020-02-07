<?php require_once 'includes/connect.php'; ?>
<?php require_once 'includes/functions.php';?>
<html lang = "es">
    <head>
        <meta charset="UTF-8">
        <title>Blog</title>
        <link type="text/css" href ="css/styles.css" rel="stylesheet">
    </head>
    <body>
        <!-- Contenedor principal -->
        <div id="container">
        <!-- Cabecera -->
        <header>
            <div id = "logo">
                <a href="index.php">
                <?php if (isset($_SESSION['usuario'])):?>
                <?php echo $_SESSION['usuario']['nombre'].' '.$_SESSION['usuario']['apellido'].' ';?>
                <?php else: 
                        echo "User's ";
                    endif;?>
                 Blog</a>
            </div>
           <!-- Menú -->
           <nav id="nav">
               <div id ="center-nav">
               <ul id="navbar">
                   <li><a href="index.php">Inicio</a></li>
                   
                   <?php if (isset($_SESSION['usuario'])):
                            $categorias = mostrarCategoria($conexion, $_SESSION['usuario']['id']);
                            
                            if ($categorias):
                                while ($cat = mysqli_fetch_assoc($categorias)){
                                    echo '<li><a href = "categoria.php?id='.$cat['cat_id'].'"'.'>'.$cat['nombre_cat'].'</a></li>';
                                         }
                           else:
                   
                           echo $_SESSION['modelo_categoria'];
                           
                           endif;
                        else:
                            echo $_SESSION['modelo_categoria'];
                         endif;?>
                   <li><a href="#">Sobre mí</a></li>
                   <li><a href="#">Contacto</a></li>
               </ul>
           </div>
           </nav>
           <div class="clearfix"></div>
        </header>
        <!-- Sub-Contenedor -->
        <div id = "subcontainer">