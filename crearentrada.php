<?php require_once 'includes/redirect.php';?>
<?php require_once 'includes/header.php';?>
<?php require_once 'includes/sidebar.php';?>


<!-- Caja Principal -->
<div id="principal" class="agregarcat">
    <h1>Panel de entradas</h1>
    <h2>Sus entradas</h2>
        <p>Para eliminar una categoría, haga click sobre el botón borrar.</p>
    <ul id="listar_item">
  <?php if (isset($_SESSION['usuario'])):
            $entradas = mostrarEntradas($conexion, $_SESSION['usuario']['id']);
            if ($entradas):
                while ($ent = mysqli_fetch_assoc($entradas)){
                    echo "<li>".$ent['titulo']." <a class='borrar-item' href= 'borraritem.php'> Borrar</a></li>";
                }
            endif;
        endif;?>
    </ul>
        
        
    <h2>Añadir nueva</h2>
        <p> Añada una nueva entrada y guardela. Recuerde completar todos los campos.</p>
        <form action="guardarentrada.php" method="POST">
        <label for="titulo">Título:</label>
        <input type="text" name ="titulo">
         <?php if (isset($_SESSION['errores_entrada'])): echo mostrarError($_SESSION['errores_entrada'], 'titulo');  endif; ?>
        <label for="categoria_id">Categoría:</label>
        <?php if (isset($_SESSION['errores_entrada'])): echo mostrarError($_SESSION['errores_entrada'], 'categoria');  endif; ?>
        <select name="categoria_id">
            <?php
                    $categorias = mostrarCategoria($conexion, $_SESSION['usuario']['id']);
                        if (!empty($categorias)):
                            while ($cat = mysqli_fetch_assoc($categorias)){?>
                                  
            <option value ="<?=$cat['cat_id'];?>">
                <?=$cat['nombre_cat'];?>
            </option>            
                        <?php }
                        endif;?>
        </select>
        <label for="descripcion">Descripción:</label>
        <?php if (isset($_SESSION['errores_entrada'])): echo mostrarError($_SESSION['errores_entrada'], 'descripcion');  endif; ?>
        <textarea id ="editor" name="descripcion"></textarea>
        
        <?php if (isset($_SESSION['mensaje_entrada'])): echo mostrarExito($_SESSION['mensaje_entrada']).' Para visualizarla click <a href="index.php">aquí</a>'; endif;
              if (isset($_SESSION['error_entrada'])): echo mostrarFallo($_SESSION['error_entrada']);  endif;
              
        ?>
        
        
        <input type="submit" value="Guardar">
        
        <?php borrarError();?>

    </form>


<!-- Fin Caja Principal -->
</div>

<?php require_once 'includes/footer.php'; ?>