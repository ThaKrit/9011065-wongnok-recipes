<?php
error_reporting(0);
session_start();
include 'dbconnect.php';

    $mysqli = new mysqli($servername, $username, $password, $database);
    $mysqli -> set_charset("UTF8");

    
            $insertSQL = "DELETE FROM foodrecipes WHERE food_id = '".$_SESSION['food_id']."'";
            $inseryQuery = $mysqli -> query($insertSQL);

        session_start();
        header('Location:../items.php');

        
?>
<!-- 
1
ไข่เจียว
img_6613ca2cb78bb.jpg
1.น้ำมัน
2.ไข่เจียว
3.ผงปรุงรส
4.ซอสภูเขาทอง (ฝาเขียว)
1.ตั้งน้ำมันให้ร้อนค่อนเดือด
2.ตีไข่ให้ไข่แดงกับไข่ขาวเข้ากันดี 
3.นำเครื่องปรุงรสที่เตรียมไว้ใส่ในไข่ตามชอบ
4.เมื่อน้ำมันเดือดแล้วให้นำไข่ที่ตีจนเข้ากันแล้วเทลงในกระทะ
5.สังเกตุสีของไข่ให้สุกเท่ากันท
1
1
2
0
0
1 -->