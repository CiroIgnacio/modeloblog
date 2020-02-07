<?php
require_once 'includes/connect.php';
require_once 'includes/functions.php';
if(isset($_POST)){
    
    $nombre = isset($_POST['categoria']) ? mysqli_real_escape_string($conexion, $_POST['categoria']) : false;
    if(!empty($nombre) && !is_numeric($nombre)){
       $nombre_valido = true;
       
       if($nombre_valido){
            guardarCategoria($conexion, $nombre, $_SESSION['usuario']['id']);
        }
        else {
            $_SESSION['error'] = "Ha ocurrido un error al añadir la categoría";

        }
}
    else{
        $_SESSION['error'] = "El nombre ingresado para la categoría no es válido";
    
    }

}
$header = header('Location: crearcategoria.php');
