<?php require_once 'includes/redirect.php';?>
<?php require_once 'includes/header.php';?>
<?php require_once 'includes/sidebar.php';?>


<!-- Caja Principal -->
<div id="principal" class="agregarcat">
    <h1>Panel de categorías</h1>
    <h2>Sus categorías</h2>
        <p>Para eliminar una categoría, haga click sobre el botón borrar.</p>
    <ul id="listar_item">
  <?php if (isset($_SESSION['usuario'])):
            $categorias = mostrarCategoria($conexion, $_SESSION['usuario']['id']);

            if ($categorias):
                while ($cat = mysqli_fetch_assoc($categorias)){
                    echo "<li>".$cat['nombre_cat']." <a class='borrar-item' href= 'borraritem.php'> Borrar</a></li>";
                         }
            endif;
        endif;?>
    </ul>
    <h2>Añadir nueva</h2>
        <p> Añada una nueva categoría y guardela. Por una cuestión de navegabilidad no podrá guardar más de 8 categorías.</p>
    <form action="guardarcat.php" method="POST">
        <label for="categoria">Nombre de la categoría:</label>
        <input type="text" name ="categoria">
        <?php if (isset($_SESSION['mensaje_categoria'])): echo mostrarExito($_SESSION['mensaje_categoria']); endif;
              if (isset($_SESSION['error_categoria'])): echo mostrarFallo($_SESSION['error_categoria']);  endif;
        ?>
        <input type="submit" value="Guardar">
        <?php  borrarError();?>
    </form>


<!-- Fin Caja Principal -->
</div>




<?php require_once 'includes/footer.php'; ?>