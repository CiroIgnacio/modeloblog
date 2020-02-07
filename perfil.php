<?php require_once 'includes/redirect.php';?>
<?php require_once 'includes/header.php';?>
<?php require_once 'includes/sidebar.php';?>

<!-- ACTUALIZAR -->
<!-- Datos de Registro -->
<div id="principal">
<h1>Mis datos</h1>
<form action="actualizar-datos.php" method="post" id="actualizar-datos">
        <label for="nombre">Nombre</label>
        <input type="text" name="nombre" placeholder="Ingrese su nombre" value="<?=$_SESSION['usuario']['nombre']?>"/>
        <?php if (isset($_SESSION['errores'])): echo mostrarError($_SESSION['errores'], 'nombre');  endif; ?>
        <label for="apellido">Apellido</label>
        <input type="text" name="apellido" placeholder="Ingrese su apellido" value="<?=$_SESSION['usuario']['apellido']?>"/>
        <?php if (isset($_SESSION['errores'])): echo mostrarError($_SESSION['errores'], 'apellido');  endif; ?>
        <label for="email">E-mail</label>
        <input type="email" name="email" placeholder="Ingrese su email" value="<?=$_SESSION['usuario']['email']?>"/>
        <?php if (isset($_SESSION['errores'])): echo mostrarError($_SESSION['errores'], 'email');  endif; ?>
        <label for="password">Nueva Contraseña</label>
        <input type="password" name="password" placeholder="Ingrese la nueva contraseña">
        <small>(*) Debe contener mínimo 8 caracteres y un número</small>
        <?php if (isset($_SESSION['errores'])): echo mostrarError($_SESSION['errores'], 'password');  endif; ?>
        <input type="submit" value="Guardar"> 
        <?php if (isset($_SESSION['mensaje'])): echo mostrarExito($_SESSION['mensaje']); endif;
              if (isset($_SESSION['error'])): echo mostrarFallo($_SESSION['error']);  endif; ?>

        <?php  borrarError();?>
    </form>
</div>
 

<!-- INICIO FOOTER -->

<?php require_once 'includes/footer.php'; ?>