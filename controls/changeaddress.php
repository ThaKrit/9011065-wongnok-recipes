<?php
    error_reporting(0);
    
    include 'dbconnect.php';

    $mysqli = new mysqli($servername, $username, $password, $database);
    $mysqli -> set_charset("UTF8");

    session_start();

    $insertSQL = "UPDATE accounts SET acc_address = '" .trim($_POST["txtAddress"]). "' WHERE acc_id='" .$_SESSION['userid']. "'";
    $inseryQuery = $mysqli -> query($insertSQL);

    $_SESSION['address'] = trim($_POST["txtAddress"]);

    $_SESSION['result'] = "Change Address Complete";
    header( "Location:../result.php" );

    $mysqli->close();
?>