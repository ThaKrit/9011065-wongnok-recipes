<?php
session_start();
include 'dbconnect.php';

$mysqli = new mysqli($servername, $username, $password, $database);
$mysqli->set_charset("UTF8");

 $_POST['txtComment'];
 $_POST['rating'];
 $_POST['hidden_by'];
 $_POST['hidden_id_food'];
 $_SESSION['totalCom'] ;
 $countscore = $_POST['rating'] + $_SESSION['totalCom'] ;
 $countCom =  $_SESSION['countCom'] + 1;
 $_SESSION['totalCom']."<br>";
 $_SESSION['countCom']."<br>";
$avgScore = $countscore / $countCom;
 intval($avgScore);

  $_SESSION['usermore'];


    if($_SESSION['usermore'] >= 1) {
    echo '<script type="text/javascript">alert("ไม่สามารถคอมเม้นได้เกิน 1 ครั้ง !!");
        window.location = "../index.php";</script>';
} else {
    $insertSQL = "INSERT INTO rating(rat_score,rat_comment,rat_by,rat_id_food)
    VALUES('" . $_POST['rating'] . "','" . $_POST['txtComment'] . "','" . $_POST['hidden_by'] . "','" . $_POST['hidden_id_food'] . "')";
    $inseryQuery = $mysqli->query($insertSQL);

    $insertSQL2 = "UPDATE foodrecipes SET food_avg = '" . $avgScore . "' WHERE food_id = '" . $_POST['hidden_id_food'] . "'";
    $inseryQuery2 = $mysqli->query($insertSQL2);

    $_SESSION['id_back_comment'] = $_POST['hidden_id_food'];
    header("Location:../index.php");
}





$mysqli->close();
?>