<?php require_once 'includes/redirect.php';?>
<?php require_once 'includes/header.php';?>
<?php require_once 'includes/sidebar.php';?>

<?php $entradas = mostrarEntradas($conexion, $_SESSION['usuario']['id'], false, false, $_GET['id']);
         $ent = mysqli_fetch_assoc($entradas);
         if(!isset($ent['id'])){
             header('Location: index.php');
         }?>
<!-- Caja Principal -->
<div id="principal" class="agregarcat">
    
    <h2>Editar entradas</h2>
        <p>Edita tu entrada <?=$ent['titulo']?></p>    
        <form action="guardarentrada.php?editar=<?=$ent['id']?>" method="POST">
        <label for="titulo">Título:</label>
        <input type="text" name ="titulo" value="<?=$ent['titulo']?>">
         <?php if (isset($_SESSION['errores_entrada'])): echo mostrarError($_SESSION['errores_entrada'], 'titulo');  endif; ?>
        <label for="categoria_id">Categoría:</label>
        <?php if (isset($_SESSION['errores_entrada'])): echo mostrarError($_SESSION['errores_entrada'], 'categoria');  endif; ?>
        <select name="categoria_id">
            <?php
                    $categorias = mostrarCategoria($conexion, $_SESSION['usuario']['id']);
                        if (!empty($categorias)):
                            while ($cat = mysqli_fetch_assoc($categorias)){?>
                                  
            <option value ="<?=$cat['cat_id']?>" <?=($cat['cat_id'] == $ent['categoria_id']) ? "selected = 'selected'" : '' ?>>
                <?=$cat['nombre_cat'];?>
            </option>            
                        <?php }
                        endif;?>
        </select>
        
        <label for="descripcion">Descripción:</label>
        <?php if (isset($_SESSION['errores_entrada'])): echo mostrarError($_SESSION['errores_entrada'], 'descripcion');  endif; ?>
        <textarea id ="editor" name="descripcion"><?=$ent['descripcion']?></textarea>
        
        <?php if (isset($_SESSION['mensaje_entrada'])): echo mostrarExito($_SESSION['mensaje_entrada']).' Para visualizarla click <a href="index.php">aquí</a>'; endif;
              if (isset($_SESSION['error_entrada'])): echo mostrarFallo($_SESSION['error_entrada']);  endif;
              
        ?>
        
        
        <input type="submit" value="Guardar">
        
        <?php borrarError();?>

    </form>


<!-- Fin Caja Principal -->
</div>

<?php require_once 'includes/footer.php'; ?>