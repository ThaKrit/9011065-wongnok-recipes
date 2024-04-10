<?php
    session_start();
    include 'dbconnect.php';

    $mysqli = new mysqli($servername, $username, $password, $database);
    $mysqli -> set_charset("UTF8");

    echo $_POST['txtComment'];
    echo $_POST['rating'];
    echo $_POST['hidden_by'];
    echo $_POST['hidden_id_food'];
    echo "คะแนนรวม".$_SESSION['totalCom'];
    echo "นับจำนวน".$_SESSION['countCom'];
    $avgScore = $_SESSION['totalCom'] / $_SESSION['countCom'];
    echo($avgScore);



            $insertSQL = "INSERT INTO rating(rat_score,rat_comment,rat_by,rat_id_food)
                            VALUES('".$_POST['rating']."','".$_POST['txtComment']."','".$_POST['hidden_by']."','".$_POST['hidden_id_food']."')";
            $inseryQuery = $mysqli -> query($insertSQL);

            $insertSQL2 = "UPDATE foodrecipes SET food_avg = '".$avgScore."' WHERE food_id = '".$_POST['hidden_id_food']."'";
            $inseryQuery2 = $mysqli -> query($insertSQL2);

            $_SESSION['id_back_comment'] = $_POST['hidden_id_food'];
            header("Location:../detail.php");

   
    $mysqli->close();
?>
