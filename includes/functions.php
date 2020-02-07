<?php
function mostrarError($errores,$campo) {
     $msg_errores = '';
     if (isset($errores[$campo]) && !empty($errores)){
         $msg_errores= "<small class = 'error'>".$errores[$campo]."</small>";
     }
     
     return $msg_errores;
 }
function mostrarExito($exito) {
     $msg_exito = '';
     if (isset($exito)){
         $msg_exito= "<div class = 'exito'>".$exito."</div>";
     }
     
     return $msg_exito;
 }
 function mostrarFallo($error) {
     $msg_error = '';
     if (isset($error)){
         $msg_error= "<div class = 'error error-fallo'>".$error."</div>";
     }
     
     return $msg_error;
 }
function borrarError(){
     $_SESSION['errores'] = null;
     $_SESSION['error'] = null;
     $_SESSION['errores_entrada'] = null;
     $_SESSION['error_entrada'] = null;
     $_SESSION['errores_categoria'] = null;
     $_SESSION['mensaje_entrada'] = null;
     $_SESSION['mensaje_categoria'] = null;
     $_SESSION['mensaje'] = null;
     $_SESSION['error-login'] = null;
     unset($_SESSION['error-login']);
     unset($_SESSION['errores']);
     unset($_SESSION['mensaje']);
     unset($_SESSION['error']);
     unset($_SESSION['errores_entrada']);
     unset($_SESSION['error_entrada']);
     unset($_SESSION['errores_categoria']);
     unset($_SESSION['mensaje_entrada']);
     unset($_SESSION['mensaje_categoria']);
 }
 
 //Modelo de categorias
 
 $_SESSION['modelo_categoria'] = '<li><a href="#">Categoría 1</a></li>
                            <li><a href="#">Categoría 2</a></li>
                            <li><a href="#">Categoría 3</a></li>
                            <li><a href="#">Categoría 4</a></li>';
 
 
 function mostrarCategoria($conectar, $id){
     $query = "SELECT c.id AS cat_id, c.nombre_cat, c.user_id, u.id, u.nombre, u.apellido FROM categorias c INNER JOIN usuarios u ON c.user_id = u.id WHERE u.id = $id";
     $categoria = mysqli_query($conectar, $query);
     $resultado = array();
     
     if ($categoria && mysqli_num_rows($categoria) >= 1){
         $resultado = $categoria;
         return $resultado;
     }
     else {
         return $resultado;
     }
     
 }
     
function mostrarCategoria_Entradas($conectar, $id){
     $query = "SELECT * FROM categorias WHERE id = $id";
     $categoria = mysqli_query($conectar, $query);
     $resultado = array();
     
     if ($categoria && mysqli_num_rows($categoria) >= 1){
         $resultado = $categoria;
         return $resultado;
     }
     else {
         return $resultado;
     }
 }

 
 function mostrarEntradas($conectar, $id, $limit = null, $categoria = null, $id_entrada = null){
     $query = "SELECT e.*, c.id as cat_id, c.nombre_cat FROM entradas e INNER JOIN categorias c ON c.id = e.categoria_id WHERE c.user_id = $id ORDER BY fecha DESC";
     
     if ($limit){
            $query = "SELECT e.*, c.id as cat_id, c.nombre_cat FROM entradas e INNER JOIN categorias c ON c.id = e.categoria_id WHERE c.user_id = $id ORDER BY fecha DESC LIMIT 4";
     }
     if ($categoria){
         $query = "SELECT e.*, c.id as cat_id, c.nombre_cat FROM entradas e INNER JOIN categorias c ON c.id = e.categoria_id WHERE c.user_id = $id AND e.categoria_id = $categoria ORDER BY fecha DESC";
     }
     
     if ($id_entrada){
         $query = "SELECT e.*, c.id as cat_id, c.nombre_cat FROM entradas e INNER JOIN categorias c ON c.id = e.categoria_id WHERE e.id = $id_entrada";
     }
     
     $entrada = mysqli_query($conectar, $query);
     $resultado = array();
     if ($entrada && mysqli_num_rows($entrada) >= 1){
         $resultado = $entrada;
         return $resultado;
     }
     else {
         return $resultado;
     }
 } 
 
 
 function guardarCategoria($conectar, $nombre, $id){

        $query = "INSERT INTO categorias VALUES(DEFAULT, '$nombre', $id)";
        $guardar_cat = mysqli_query($conectar, $query);
     
            if ($guardar_cat){
           
                $_SESSION['mensaje_categoria'] = "Categoría agregada";
}   

            else{
           
                $_SESSION['error_categoria'] = "Ha ocurrido un error al añadir la categoría";
}
 }
 
function guardarEntrada($conectar,$id, $categoria_id,$titulo, $descripcion){
        
        $query = "INSERT INTO entradas VALUES(DEFAULT, $id, $categoria_id, '$titulo','$descripcion', CURDATE())";
        
        $guardar_entrada = mysqli_query($conectar, $query);
        
        if ($guardar_entrada){
           
                $_SESSION['mensaje_entrada'] = "Entrada añadida";
}   

        else{
           
                $_SESSION['error_entrada'] = "Ha ocurrido un error al añadir la entrada";
}
}