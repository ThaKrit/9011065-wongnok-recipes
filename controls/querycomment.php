<?php
session_start();
error_reporting(0);


include "dbconnect.php";
    $mysqli = new mysqli($servername, $username, $password, $database);
    $mysqli->set_charset("UTF8");



    // $queryItem = "SELECT * FROM rating ";
    $queryItem = "SELECT foodrecipes.food_id,foodrecipes.food_name,foodrecipes.food_img,foodrecipes.food_mat,foodrecipes.food_step,
                                foodrecipes.food_time,foodrecipes.food_level,foodrecipes.food_category,foodrecipes.food_by,
                        rating.rat_id_food,rating.rat_score,rating.rat_comment,rating.rat_by 
                    FROM foodrecipes,rating 
                    WHERE foodrecipes.food_id  = '" . $_POST['hidden_id'] . "' OR foodrecipes.food_id = '".$_SESSION['id_back_comment']."' 
                    AND rating.rat_id_food = '".$_SESSION['id_back_comment']."'";
    $itemSQL = $mysqli->query($queryItem);

    while ($itemResult = mysqli_fetch_array($itemSQL)) {
       echo $_SESSION['rat_by'] = $itemResult['rat_score'];?><br><?php
       echo $_SESSION['rat_comment'] = $itemResult['rat_comment'];;?><br><?php
       echo $_SESSION['rat_id_food'] = $itemResult['rat_id_food'];;?><br><?php
       echo $_SESSION['rat_by'] = $itemResult['rat_by'];;?><br><?php
       echo $itemResult['food_by'];
    }

    
?>