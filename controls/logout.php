<?php
    error_reporting(0);
    
    session_start();
    unset($_SESSION["shopping_cart"]);
    $_SESSION['isLogin'] = 0;
    header( "Location: ../index.php");
?>