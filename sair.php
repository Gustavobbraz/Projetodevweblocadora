<?php
if(!isset($_SESSION)){
    session_start();
    unset($_SESSION['usuario']);
}

session_destroy();

header("Location: index.php"); 
?>
