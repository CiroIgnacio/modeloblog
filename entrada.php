<?php require_once 'includes/header.php';?>
<?php require_once 'includes/sidebar.php';?>
<!-- Entradas -->
<div id="principal">
    
      <?php $entradas = mostrarEntradas($conexion, $_SESSION['usuario']['id'], false, false, $_GET['id']);
            $ent = mysqli_fetch_assoc($entradas);
            if(!isset($ent['id'])){
                header('Location: index.php');
            }?>
      
    <h2><?=$ent['titulo']?></h2>
    <?php if (isset($_SESSION['usuario'])):
            $entradas = mostrarEntradas($conexion, $_SESSION['usuario']['id'], false, false, $_GET['id']);
            if ($entradas):
                while ($ent = mysqli_fetch_assoc($entradas)){?>
                    <article class="entradas">
                        <span class = "subtitulo"><a href="categoria.php?id=<?=$ent['cat_id']?>"><?=$ent['nombre_cat'].' |</a> '.$ent['fecha']?>

                        <p><?=$ent['descripcion']?></p>
                <?php if ($_SESSION['usuario']['id'] == $ent['usuario_id']):?>
                  <div class="edicion">
                  <a href="editar-entrada.php?id=<?=$ent['id']?>" class="btn-lateral">Editar entrada</a>
                  <a href="eliminar-entrada.php?id=<?=$ent['id']?>" class="btn-lateral" onclick="confirm('Está seguro de que desea borrar la entrada?')">Eliminar entrada</a>
                  </div>
                  </article>
                <?php  endif; } 
            endif;
    endif;?>
                
            

    
    </div>
<?php require_once 'includes/footer.php'; ?>