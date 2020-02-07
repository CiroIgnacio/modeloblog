<?php
require_once 'includes/connect.php';
// Borrar sesión incorrecta
if (isset($_SESSION['error-login'])){
    unset($_SESSION['error-login']);
    }
if (isset($_POST)){
    $email = $_POST['email'];
    $contraseña = $_POST['password'];
    
    $sql = "SELECT * FROM usuarios WHERE email = '$email' LIMIT 1";
    $login = mysqli_query($conexion, $sql);
    if ($login && mysqli_num_rows($login) == 1){
        $usuario = mysqli_fetch_assoc($login);
        
        $verificar = password_verify($contraseña, $usuario['password']);
        
        if ($verificar){
            // Creo una sesión con los datos de usuario
            $_SESSION['usuario'] = $usuario;
            
        } else {
            $_SESSION['error-login']  = 'Los datos ingresados son incorrectos';
            if (isset($_SESSION['usuario'])){
                unset($_SESSION['usuario']);
            }
        }
        
    }
    else {
        //mostrar mensaje de error
        $_SESSION['error-login']  = 'Los datos ingresados son incorrectos';
        if (isset($_SESSION['usuario'])){
                unset($_SESSION['usuario']);
            }

 
    }
}

 header("Location: index.php");
?>
