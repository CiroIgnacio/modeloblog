<?php

session_start();

if(isset($_SESSION['usuario'])): session_destroy(); endif;

header('Location: index.php');

