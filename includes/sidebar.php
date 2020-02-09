<!-- Barra lateral -->

<aside id = "sidebar">
    <!-- Buscador -->
    <div id="buscador" class="block-aside">
        <h3>Búsqueda</h3>
        <form action="buscar.php" method="post">
            <input type="text" name="buscar"/>
            <input type="submit" value="Buscar">
        </form>
    </div>
    
    <!-- Informacion usuario -->
    
    <?php if (isset($_SESSION['usuario'])):?>
    <div class ="block-aside">
    <?php
    // Botones 
          echo "<a class = 'btn-lateral' href='perfil.php'> Perfil</a>"
                ."<a class = 'btn-lateral' href='crearentrada.php'> Agregar entrada</a>"
                ."<a class = 'btn-lateral' href='crearcategoria.php'> Agregar categoría</a>"
                . "<a class = 'btn-lateral' href = 'cerrar.php'>Cerrar sesión</a></div>'";
           endif;?>
        
    <!-- Login -->
<?php if (!isset($_SESSION['usuario'])):?>
    <div id="login" class="block-aside">
        <h3>Inicia sesión</h3>
        <form action="login.php" method="post">
            <label for="email">E-mail</label>
            <input type="email" name="email" placeholder="Ingrese su email"/>
            <label for="password">Contraseña</label>
            <input type="password" name="password" placeholder="Ingrese su contraseña"/>   
            <input type="submit" value="Ingresar">
            
    <?php if (isset($_SESSION['error-login'])):?>
         <?php echo mostrarFallo($_SESSION['error-login']);
                endif;?>
        </form>
    </div>
    <!-- Registro -->
        <?php if (isset($_SESSION['mensaje'])): echo mostrarExito($_SESSION['mensaje']); endif;
              if (isset($_SESSION['error'])): echo mostrarFallo($_SESSION['error']);  endif; ?>
        <div id="registro" class="block-aside">
        <h3>Registrate</h3>
        <form action="registro.php" method="post">
            <label for="nombre">Nombre</label>
            <input type="text" name="nombre" placeholder="Ingrese su nombre"/>
            <?php if (isset($_SESSION['errores'])): echo mostrarError($_SESSION['errores'], 'nombre');  endif; ?>
            <label for="apellido">Apellido</label>
            <input type="text" name="apellido" placeholder="Ingrese su apellido"/>
            <?php if (isset($_SESSION['errores'])): echo mostrarError($_SESSION['errores'], 'apellido');  endif; ?>
            <label for="email">E-mail</label>
            <input type="email" name="email" placeholder="Ingrese su email"/>
            <?php if (isset($_SESSION['errores'])): echo mostrarError($_SESSION['errores'], 'email');  endif; ?>
            <label for="password">Contraseña</label>
            <input type="password" name="password" placeholder="Ingrese su contraseña"/>
            <small>(*) Debe contener mínimo 8 caracteres y un número</small>
            <?php if (isset($_SESSION['errores'])): echo mostrarError($_SESSION['errores'], 'password');  endif; ?>
            <input type="submit" value="Registrate"> 
            <?php  borrarError();?>
        </form>
    </div>
    <?php endif;?>
</aside>