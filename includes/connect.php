<?php
// conectar a la base de datos
if (!isset($_SESSION)){
    session_start();
}
$conexion = mysqli_connect("localhost", "root","", "modelo_blog");

//comprobar conexion
if (mysqli_connect_errno()){
    echo "La conexión a la base de datos MySQL ha fallado".mysqli_connect_error();
}
mysqli_query($conexion, "SET NAMES 'utf8'");

/*
// consulta select desde php

$query = mysqli_query($conexion, "SELECT * FROM entradas");        
while ($entradas = mysqli_fetch_assoc($query)){
    echo '<h2>'.$entradas['titulo'].'</h2><br>';
    echo $entradas['descripcion'].'<br>';}

// insertar un dato desde php
$sql = "INSERT INTO entradas VALUES(null,'Aprendiendo desde PHP','Esta es una descripción desde php', 'green')";
$insert = mysqli_query($conexion, $sql) ;

if ($insert){
    echo "Datos insertados correctamente";
}else{
    echo "Error: ".mysqli_error($conexion); //devuelve mensaje de error
}
*/
?>
