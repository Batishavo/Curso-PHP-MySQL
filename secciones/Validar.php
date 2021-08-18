<?php
    session_start();
    $_SESSION['usuario']='pedro';
    header('Location:panel.php');
?>