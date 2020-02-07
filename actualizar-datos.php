<?php


// Recibir info, guardar en variables
if(isset($_POST)){
    require_once 'includes/connect.php';
    $nombre = isset($_POST['nombre']) ? $_POST['nombre'] : false;
    $apellido = isset($_POST['apellido']) ? $_POST['apellido'] : false;
    $email = isset($_POST['email']) ? $_POST['email'] : false;
    $password = isset($_POST['password']) ? $_POST['password'] : false;
}

// Array de errores

$errores = array();

//Validar el nombre

if(!empty($nombre) && !is_numeric($nombre) && !preg_match("/[0-9]/", $nombre)){
    $nombre_valido = true;
}
else {
    $nombre_valido = false;
    $errores['nombre'] = "El nombre ingresado no es válido";
}
// Validar el apellido

if(!empty($apellido) && !is_numeric($apellido) && !preg_match("/[0-9]/", $apellido)){
    $apellido_valido = true;
}
else {
    $apellido_valido = false;
    $errores['apellido'] = "El apellido ingresado no es válido";
}
// Validar el email

if(!empty($email) && filter_var($email, FILTER_VALIDATE_EMAIL)){
    $email_valido = true;
}
else {
    $email_valido = false;
    $errores['email'] = "El email ingresado no es válido";
}

//Validar la contraseña

if(!empty($password) && preg_match("/[0-9]/", $password) && strlen($password) > 8){
    $contraseña_valido = true;
}
else {
    $contraseña_valido = false;
    $errores['password'] = "La contraseña ingresada no es válida";
}

$password_cif = password_hash($password, PASSWORD_BCRYPT, ['cost' => 4]);

$guardar = false;
$id = $_SESSION['usuario']['id'];
if (sizeof($errores) == 0){
    $query = "UPDATE usuarios SET nombre = '$nombre', apellido = '$apellido', email = '$email', password = '$password_cif'  WHERE id = $id";
    $guardar = mysqli_query($conexion, $query);
    if ($guardar){
        $_SESSION['usuario']['nombre'] = $nombre;
        $_SESSION['usuario']['apellido'] = $apellido;
        $_SESSION['usuario']['email'] = $email;
        $_SESSION['mensaje'] = "Sus datos se han actualizado correctamente";
}   

}else{
    $_SESSION['errores'] = $errores; 
    $_SESSION['error'] = "La actualización ha fallado, intente nuevamente";
}


header('Location: perfil.php');

?>