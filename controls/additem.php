<?php
    error_reporting(0);
    
    echo $_POST['txtName'];
    echo $_POST['txtIng'];
    echo $_POST['txtStep'];
    echo $_POST['txtTime'];
    echo $_POST['txtLevel'];
    echo $_POST['user_Name'];
    $count = "0";
    $score = "0";
    include 'dbconnect.php';

    $mysqli = new mysqli($servername, $username, $password, $database);
    $mysqli -> set_charset("UTF8");

    
        $ext = pathinfo (basename($_FILES['fileUpload']['name']),PATHINFO_EXTENSION);
        $new_img_name = 'img_'.uniqid().".".$ext;
        $path = "img/";
        $uploadpath = $path.$new_img_name;
        $fileUpload = $new_img_name;
        echo $fileUpload;

        if(move_uploaded_file($_FILES["fileUpload"]["tmp_name"],$uploadpath)){
            $insertSQL = "INSERT INTO foodrecipes(food_name,food_img,food_mat,food_step,food_time,food_level,food_category,food_score,food_count,food_by)
                            VALUES('" .trim($_POST['txtName']). "','" .$fileUpload. "','" .trim($_POST['txtIng']). "','" .trim($_POST['txtStep']). "'
                            ,'" .trim($_POST['txtTime']). "','" .trim($_POST['txtLevel']). "','" .trim($_POST['txtCategpry']). "','".$score."','".$count."','" .trim($_POST['user_Name']). "')";
            $inseryQuery = $mysqli -> query($insertSQL);

        session_start();
        echo "upload complete";
        header( "Location:../items.php" );
	    } 
   
    $mysqli->close();
?>