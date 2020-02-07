<?php
require_once 'includes/connect.php';
require_once 'includes/functions.php';
if(isset($_POST)){
    
    $titulo = isset($_POST['titulo']) ? mysqli_real_escape_string($conexion, $_POST['titulo']) : false;
    $categoria_id = isset($_POST['categoria_id']) ? (int)$_POST['categoria_id'] : false;
    $descripcion = isset($_POST['descripcion']) ? mysqli_real_escape_string($conexion, $_POST['descripcion']) : false;
    $entrada_id = $_GET['editar'];
    $id = $_SESSION['usuario']['id'];
    // Validacion
    
    $errores = array();
    
    if(empty($titulo)){
       $errores['titulo'] = 'El título no es válido. Debe completar el campo.';
    }
       
    if(empty($descripcion)){
            $errores['descripcion'] = 'La descripcinó no es válida. Debe completar el campo.';
        }
    if(empty($categoria_id) && !is_numeric($categoria_id)){
            $errores['categoria'] = 'Debe seleccionar una categoría';
        }

    if (count($errores) == 0){
        if (isset($_GET['editar'])){
            $query = "UPDATE entradas SET categoria_id = $categoria_id, titulo = '$titulo', descripcion = '$descripcion' WHERE id = $entrada_id AND usuario_id = $id";
            $guardar_entrada = mysqli_query($conexion, $query);
            $_SESSION['mensaje_entrada'] = 'La entrada ha sido modificada con éxito';
        }
        else{
            guardarEntrada($conexion, $_SESSION['usuario']['id'], $categoria_id, $titulo, $descripcion);
            $_SESSION['mensaje_entrada'] = 'La entrada ha sido creada con éxito';
        }
        }
    
    
    else {
        $_SESSION['errores_entrada'] = $errores;
    }
    
}

if(isset($_GET['editar'])){
        $header = header('Location: editar-entrada.php');
}
$header = header('Location: crearentrada.php');
