<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Wongnok Recipes</title>

    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- Style CSS -->
    <link rel="stylesheet" href="assets/style.css">
    

</head>
<body>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
        <a class="navbar-brand ml-5" href="index.php">Wongnok Recipe</a>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                </li>
                <li class="nav-item">
                </li>
                <li class="nav-item">
                </li>
            </ul>   
            <div class="form-inline my-2 my-lg-0 mr-5">
                <div class="dropdown">
                    <a class="nav-link dropdown-toggle link-unstyled" 
                        style="text-decoration: none; color: #eee;" href="#" 
                            role="button" data-toggle="dropdown" aria-expanded="false">
                    <?php
                    error_reporting(0);
                    
                    session_start();
                    if($_SESSION['isLogin'] == 1) {
                        echo  $_SESSION['name'];
                    }else{
                        echo "My Account";
                    }
                ?>   
                    </a>
                    <?php
                    error_reporting(0);
                    
                    session_start();
                    if($_SESSION['isLogin'] == 1) {?>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="items.php">My Profile</a>
                        <a class="dropdown-item" href="#">Favorite</a>
                        <a class="dropdown-item" href="controls/logout.php">Logout</a>
                </div>
                <?php
                    }else{?>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="login.php">Login</a>
                        <a class="dropdown-item" href="register.php">Register</a>
                </div>
                    <?php
                    }
                ?>   
                    
            </div>
    </nav>
    
    <section id="home">
        <div class="main">
            <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                    <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
                </ol>
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="images/card4-1.jpg" class="d-block w-100" >
                        <div class="carousel-caption d-none d-md-block">
                            <h1 class="caption" style="color:white"><strong>Welcome to Wongnok Recipe</strong></h1>
                            <h5 class="caption"> </h5>
                            <!-- <p class="caption caption-p">สวัสดีคณะกรรมการทุก ๆ ท่านครับ </p> -->
                        </div>
                    </div>
                    </div>
                </div>
            </div>

    </section>


    <section id="Search">
                
                <!-- Search Area -->
                <div class="container mt-5">
                <h1 class="card-title text-center"><strong>Search</strong></h1>
                <h4 class="text-center">Select only one thing</h4><br>
                <form class="form" role="form" autocomplete="off" id="formPost" method="post" action="index.php?action=search" enctype="multipart/form-data">
                    <div class="input-group input-group-sm">
                        <input type="text" id="txtSearch" name="txtSearch" class="form-control" aria-label="Small" aria-describedby="inputGroup-sizing-sm"
                            placeholder="Search... By Food Name , Ingredients , User">
                        <div class="input-group-append">
                            <button type="submit" name="searchRecipe" class="btn btn-success btn-number">
                                <i class="fa fa-search"></i>
                            </button>
                        </div>
                    </div>
                    
                </form>
    </section>
        

    <section id="category">
                
        <!-- Category Area -->
        <div class="container mt-5">
            <div class="row">
                <div class="col-md-3 mb-3">
                    <div class="card">
                        <img src="images/appetizer.jpg" class="card-img-top" alt="..."  align="center">
                        <div class="card-body">
                            <h4 class="card-title text-center"><strong>Appetizer Recipes</strong></h4>
                            <h5 class="card-title text-center"><strong>อาหารว่าง</strong></h5>
                            <form action="index.php?action=category1" method="post" >
                                <input type="submit" class="btn btn-dark btn-block" value="View List" name="category1">
                            </form><br>
                        </div>
                    </div>
                </div>

                <div class="col-md-3 mb-3">
                    <div class="card">
                        <img src="images/dinner.jpg" class="card-img-top" alt="..." align="center">
                        <div class="card-body">
                            <h4 class="card-title text-center"><strong>Savory Recipes</strong></h4>
                            <h5 class="card-title text-center"><strong>อาหารคาว</strong></h5>
                            <form action="index.php?action=category2" method="post" >
                                <input type="submit" class="btn btn-dark btn-block" value="View List" name="category2">
                            </form><br>
                        </div>
                    </div>
                </div>

                <div class="col-md-3 mb-3">
                    <div class="card">
                        <img src="images/dessert.jpeg" class="card-img-top" alt="..." align="center" >
                        <div class="card-body">
                            <h4 class="card-title text-center"><strong></strong>Dessert Recipes</h4>
                            <h5 class="card-title text-center"><strong>อาหารหวาน</strong></h5>
                            <form action="index.php?action=category3" method="post" >
                                <input type="submit" class="btn btn-dark btn-block" value="View List" name="category3">
                            </form>
                        </div>
                    </div>
                </div>

                <div class="col-md-3 mb-3">
                    <div class="card text-center"><br>
                        <h5>Difficulty Level</h5> 
                        <h5>Time to Cooking</h5>
                        <form action="index.php?action=level&time" method="post" >
                        <div class="card-body">
                        <select name="txtTime"type="text" required name="txtTime" class="form-control" autocomplete="off" value="">
                                        <option value="0"><?php echo "Please select Time " ?></option>
                                        <option value="1"><?php echo "5 - 10 mins" ?></option>
                                        <option value="2"><?php echo "10 - 30 mins" ?></option>
                                        <option value="3"><?php echo "31 - 60 mins" ?></option>
                                        <option value="4"><?php echo "60+ mins" ?></option>
                                    </select> 
                        <label></label>
                        <select name="txtLevel"type="text" required name="txtLevel" class="form-control" autocomplete="off" value="">
                                        <option value="0"><?php echo "Please select Level " ?></option>
                                        <option value="1"><?php echo "Easy" ?></option>
                                        <option value="2"><?php echo "Medium" ?></option>
                                        <option value="3"><?php echo "Hard" ?></option>
                                    </select> 
                                    <label></label>
                            
                                <input type="submit" class="btn btn-dark btn-block" value="View List" name="TimenLevel">
                            </form>
                        </div>
                    </div>
                </div>

    </section>


    <section id="allrecipes">
                
                <!-- Search Area -->
        <div class="container mt-5">
            <style>hr.hr1 {border: 1px solid gray;}</style>
            <hr class="hr1"><br><br>
            <h1 class="card-title text-center">
                <strong>
                    <?php
                    if(isset($_POST['category1'])){
                            echo "Category : Appetizer Recipes";
                        }elseif(isset($_POST['category2'])){
                            echo "Category : Savory Recipes";
                        }elseif(isset($_POST['category3'])){
                            echo "Category : Dessert Recipes";
                        }elseif(isset($_POST['searchRecipe'])){
                        if($_POST['txtSearch'] != ""){
                            echo "Search Recipes : "  . '"' . $_POST['txtSearch'];
                        }else{
                            echo "All Recipes";
                        }
                        }elseif(isset($_POST['TimenLevel'])){
                            echo "Search by Difficulty Level & Time to Cooking";   
                        }elseif(isset($_GET['name'])){
                            echo "Recipes By : " . $_GET['name'];
                    }else{
                            echo "All Recipes";
                    }
                    ?>
                </strong></h1>

            <?php 
                session_start();
                error_reporting(0);

                    include "controls/dbconnect.php";
                    $mysqli = new mysqli($servername, $username, $password, $database);
                    $mysqli->set_charset("UTF8");

                    if(isset($_POST['category1'])){
                            $queryItem = "SELECT * FROM foodrecipes WHERE food_category = '1'";
                        }elseif(isset($_POST['category2'])){
                            $queryItem = "SELECT * FROM foodrecipes WHERE food_category = '2'";
                        }elseif(isset($_POST['category3'])){
                            $queryItem = "SELECT * FROM foodrecipes WHERE food_category = '3'";
                        }elseif(isset($_POST['searchRecipe'])){
                    if($_POST['txtSearch'] != ""){
                            $queryItem = "SELECT * FROM foodrecipes WHERE food_by LIKE '%" .$_POST['txtSearch']. "%' 
                                            OR food_name LIKE '%" .$_POST['txtSearch']. "%'
                                            OR food_mat LIKE '%" .$_POST['txtSearch']. "%' ";
                        }elseif($_POST['txtSearch'] == ""){
                            $queryItem = "SELECT * FROM foodrecipes";
                        }
                    }if(isset($_POST['TimenLevel'])){
                            if($_POST['txtTime'] != '0' && $_POST['txtLevel'] == 0){
                                $queryItem = "SELECT * FROM foodrecipes WHERE food_time = '".$_POST['txtTime']."'";
                            }elseif($_POST['txtTime'] == '0' && $_POST['txtLevel'] != '0'){
                                $queryItem = "SELECT * FROM foodrecipes WHERE food_level = '".$_POST['txtLevel']."'";
                            }elseif($_POST['txtTime'] != '0' && $_POST['txtLevel'] != '0'){
                                $queryItem = "SELECT * FROM foodrecipes WHERE food_time = '".$_POST['txtTime']."' AND food_level = '".$_POST['txtLevel']."' ";
                            }
                        }if(isset($_GET['name'])){
                            $queryItem = "SELECT * FROM foodrecipes WHERE food_by LIKE '%" .$_GET['name']. "%'";
                        }else{
                            $queryItem = "SELECT * FROM foodrecipes";
                    }

                    $itemSQL = $mysqli->query($queryItem);
                    
                    
                    ?>
                    <div class="container mt-5">
                    <div class="row"><?php

                    while ($itemResult = mysqli_fetch_array($itemSQL)) {
                        $recipeID = $itemResult['food_id'];
                        $categoryID = $itemResult['food_category'];
                        $recipeimages = $itemResult['food_img'];
                        $recipeName = $itemResult['food_name'];
                        $recipeIngredients = $itemResult['food_mat'];
                        $categoryName = "";
                        if($categoryID =="1"){$categoryName = "อาหารว่าง";}
                            elseif($categoryID =="2"){$categoryName = "อาหารคาว";}
                            elseif($categoryID =="3"){$categoryName = "อาหารหวาน";}

                    
                            
                ?>  
            
                    <div class="col-md-4 mb-4">
                    <div class="card">
                        <img src="controls/img/<?php echo $recipeimages;?>" class="card-img-top" alt="..." style="height: 200px;">
                        <div class="card-body">
                            <h4 class="card-title text-center"><strong><?php echo $recipeName?></strong></h4>
                            <h5 class="card-title text-center"><strong><?php echo $categoryName . " | ";?></strong>คะแนน 0 ดาว</h5>
                            <form action="detail.php" method="post" enctype="multipart/form-data">
                                <input type="hidden" name="hidden_img_food" value="<?php echo $recipeimages;?>">
                                <input type="hidden" name="hidden_name_food" value="<?php echo $recipeName ;?>">
                                <input type="hidden" name="hidden_cate_food" value="<?php echo $categoryName ;?>">
                                <input type="hidden" name="hidden_ing_food" value="<?php echo $recipeIngredients;?>">
                                <input type="hidden" name="hidden_id_food" value="<?php echo $recipeID;?>">
                                <input type="hidden" name="hidden_step_food" value="<?php echo $itemResult['food_step'];?>">
                                <input type="hidden" name="hidden_time_food" value="<?php echo $itemResult['food_time'];?>">
                                <input type="hidden" name="hidden_level_food" value="<?php echo $itemResult['food_level'];?>">
                                <input type="hidden" name="hidden_by_food" value="<?php echo $itemResult['food_by'];?>">
                                <input type="submit" class="btn btn-dark btn-block" value="Detail" name="Detail">
                            </form>
                        </div>
                    </div>
                    </div>
                
                <?php } ?>


    </section>

    <!------------------------------------------------------------------------------------------------------------------------------------>


     <br><br><br><br><br><br>


    <!-- Footer -->
    <footer class="py-4" style="background-color: #262626">
        <div class="container">
        
            <p class="m-0 text-center text-white"> <?php 
            if($_SESSION['isLogin'] == 0){
                echo"สวัสดีคณะกรรมการทุก ๆ ท่านครับ -/\-";
            }else{
                echo"สวัสดีคณะกรรมการทุก ๆ ท่านครับ -/\-";
        }?> </p>
        
            
        
        </div>
    </footer>
    <script src="assets/script.js"></script>
  
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js" integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous"></script>



</body>
</html>