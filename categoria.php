<?php require_once 'includes/header.php';?>
<?php require_once 'includes/sidebar.php';?>
<!-- Entradas -->
<div id="principal">
    
      <?php $categorias = mostrarCategoria_Entradas($conexion, $_GET['id']);
            $cat = mysqli_fetch_assoc($categorias);
            if(!isset($cat['id'])){
                header('Location: index.php');
            }?>
      
    <h1>Entradas de <?=$cat['nombre_cat']?></h1>
    <?php if (isset($_SESSION['usuario'])):
            $entradas = mostrarEntradas($conexion, $_SESSION['usuario']['id'], false, $_GET['id']);
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
                echo "<p> Usted aún no posee entradas, cree su primer entrada haciendo click <a href = 'crearentrada.php'>aquí</a></p>";
            endif;   
          else:?>
 
          <?php endif; ?>

    
    </div>
<?php require_once 'includes/footer.php'; ?>