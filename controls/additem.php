<?php
    error_reporting(0);
    
    echo "ชื่อ".$_POST['txtName']."<br>";
    echo "ส่วนประกอบ".$_POST['txtIng']."<br>";
    echo "วิธี".$_POST['txtStep']."<br>";
    echo "เวลา".$_POST['txtTime']."<br>";
    echo "ความยาก".$_POST['txtLevel']."<br>";
    echo "ชื่อคนสร้าง".$_POST['user_Name']."<br>";
    $count = "0";
    $score = "0";
    $avg = "0";
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
            $insertSQL = "INSERT INTO foodrecipes(food_name,food_img,food_mat,food_step,food_time,food_level,food_category,food_by,food_avg)
                            VALUES('" .trim($_POST['txtName']). "','" .$fileUpload. "','" .trim($_POST['txtIng']). "','" .trim($_POST['txtStep']). "'
                            ,'" .trim($_POST['txtTime']). "','" .trim($_POST['txtLevel']). "','" .trim($_POST['txtCategpry']). "','" .trim($_POST['user_Name']). "','".$avg."')";
            $inseryQuery = $mysqli -> query($insertSQL);

        session_start();
        echo "upload complete";
        header( "Location:../items.php" );
	    }else{
            echo '<script type="text/javascript">alert("กรุณากรอกข้อมูลให้ครบครับ !!");
        window.location = "../items.php";</script>';
        }
   
    $mysqli->close();
?>