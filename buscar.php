<?php require_once 'includes/header.php';?>
<?php require_once 'includes/sidebar.php';?>
<!-- Entradas -->
<div id="principal">
    <h2>Resultado de su búsqueda: <i><?=$_POST['buscar']?></i></h2>    
        <?php 
            if (isset($_SESSION['usuario'])):
            $busqueda = $_POST['buscar'];
            $entradas = mostrarEntradas($conexion, $_SESSION['usuario']['id'], false, false, false, $busqueda);
    
           
                if ($entradas):
                    while ($ent = mysqli_fetch_assoc($entradas)){?>
                    <a href="entrada.php?id=<?=$ent['id']?>">
                    <article class="entradas">
                     <h2><?=ltrim($ent['titulo'])?></h2>
                     <span class = "subtitulo"><?=$ent['nombre_cat'].' | '.$ent['fecha']?>
                     <p><?=$ent['descripcion']?></p>
                    </article>
                    </a>
                <?php 
                }
                else:
                    echo "<p> No se ha encontrado ningún resultado para su búsqueda. Para volver a inicio haga click <a href = 'crearentrada.php'>aquí</a></p>";
                endif;
            else:
            echo "<p> Inicie sesión para hacer una búsqueda de sus entradas. Para volver a inicio haga click <a href = 'crearentrada.php'>aquí</a></p>";    
                endif; ?>
                    
    </div>
<?php require_once 'includes/footer.php'; ?>