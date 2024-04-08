<?php
    error_reporting(0);
    
    include 'dbconnect.php';

    $mysqli = new mysqli($servername, $username, $password, $database);
    $mysqli -> set_charset("UTF8");

    $chkSQL = "SELECT * FROM accounts WHERE acc_user ='" .trim($_POST['txtUsername']). "'";
    $querySQL = $mysqli -> query($chkSQL);
    $queryResult = mysqli_fetch_array($querySQL);

    if($queryResult) {
        session_start();
        $_SESSION['result'] = "Username already exists";
        header( "Location:../index.php" );
    } else if($_POST["txtPassword"] != $_POST["txtConPassword"]) {
        session_start();
        $_SESSION['result'] = "Password don't match";
        header( "Location:../index.php" );
    } else {
        $insertSQL = "INSERT INTO accounts(acc_user, acc_pass, acc_name, acc_lastname, acc_address, acc_type) 
        VALUES('" .$_POST["txtUsername"]. "', '" .$_POST["txtPassword"]. "', '" .$_POST["txtName"]. "', '" .$_POST["txtLastname"]. "',  '" .$_POST["txtAddress"]. "', '1')";
        $inseryQuery = $mysqli -> query($insertSQL);

        session_start();
        $_SESSION['result'] = "Register Complete";
        header( "Location:../index.php" );
    }
    $mysqli->close();
?>