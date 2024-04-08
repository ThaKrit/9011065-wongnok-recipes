<?php
    error_reporting(0);
    
    include 'dbconnect.php';

    $mysqli = new mysqli($servername, $username, $password, $database);
    $mysqli -> set_charset("UTF8");

    session_start();
    if($_SESSION['oldpass'] != trim($_POST['txtoldPass'])) {
        $_SESSION['result'] = "Please check you old password";
        header( "Location:../result.php" );
    } else {
        if(trim($_POST['txtnewPass']) != trim($_POST['txtconnewPass'])) {
            $_SESSION['result'] = "Please check you new password";
            header( "Location:../result.php" );
        } else {
            $insertSQL = "UPDATE accounts SET acc_pass = '" .trim($_POST["txtnewPass"]). "' WHERE acc_id='" .$_SESSION['userid']. "'";
            $inseryQuery = $mysqli -> query($insertSQL);

            $_SESSION['oldpass'] = trim($_POST["txtnewPass"]);
        
            $_SESSION['result'] = "Change Password Complete";
            header( "Location:../result.php" );
        }
    }
    $mysqli->close();
?>