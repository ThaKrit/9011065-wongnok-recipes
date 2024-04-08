<?php
    error_reporting(0);
    
    include 'dbconnect.php';

    $mysqli = new mysqli($servername, $username, $password, $database);
    $mysqli -> set_charset("UTF8");

    $chkSQL = "SELECT * FROM accounts WHERE acc_user = '" .trim($_POST['txtUsername']). "' and acc_pass = '" .trim($_POST['txtPassword']). "'";
    $querySQL = $mysqli -> query($chkSQL);
    $queryResult = mysqli_fetch_array($querySQL);

    if($queryResult) {
        session_start();

        $_SESSION['userid'] = $queryResult["acc_id"];
        $_SESSION['oldpass'] = $queryResult["acc_pass"];
        $_SESSION['name'] = $queryResult["acc_name"];
        $_SESSION['lastname'] = $queryResult["acc_lastname"];
        $_SESSION['address'] = $queryResult["acc_address"];

        if($queryResult['acc_type'] == 1) { // Admin S
            $_SESSION['isLogin'] = 1;
            $_SESSION['isAdmin'] = 1;
            $_SESSION['isadd'] = 1;
            header( "Location: ../index.php");
        } 
        
    } else {
        session_start();
        $_SESSION['result'] = "Username and Password not correct";
        header( "Location:../result.php" );
    }
?>
