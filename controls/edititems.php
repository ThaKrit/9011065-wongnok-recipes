<?php
error_reporting(0);
session_start();

include 'dbconnect.php';

$mysqli = new mysqli($servername, $username, $password, $database);
$mysqli->set_charset("UTF8");
$queryItem = "SELECT * FROM foodrecipes WHERE food_id = '" . $_SESSION['food_id'] . "' ";
$itemSQL = $mysqli->query($queryItem);





if (isset($_POST["edit"])) {
    $itemSQL = "";
    
    $ext = pathinfo (basename($_FILES['fileUpload']['name']),PATHINFO_EXTENSION);
        $new_img_name = 'img_'.uniqid().".".$ext;
        $path = "img/";
        $uploadpath = $path.$new_img_name;
        $fileUpload = $new_img_name;
        echo $fileUpload;

        if(move_uploaded_file($_FILES["fileUpload"]["tmp_name"],$uploadpath) == true){
        $itemSQL = "UPDATE foodrecipes SET 
            food_name ='" . $_POST['txtName'] . "' ,
            food_mat ='" . $_POST['txtIng'] . "' ,
            food_step ='" . $_POST['txtStep'] . "' ,
            food_time ='" . $_POST['txtTime'] . "' ,
            food_level ='" . $_POST['txtLevel'] . "' ,
            food_category ='" . $_POST['txtCategory'] . "' ,
            food_img = '".$fileUpload."'
        WHERE food_id ='" . $_POST["hidden_id"] . "'";
    $itemQuery = $mysqli->query($itemSQL);
    header("Location:../items.php");
}elseif(move_uploaded_file($_FILES["fileUpload"]["tmp_name"],$uploadpath) == false){
    $itemSQL = "UPDATE foodrecipes SET 
        food_name ='" . $_POST['txtName'] . "' ,
        food_mat ='" . $_POST['txtIng'] . "' ,
        food_step ='" . $_POST['txtStep'] . "' ,
        food_time ='" . $_POST['txtTime'] . "' ,
        food_level ='" . $_POST['txtLevel'] . "' ,
        food_category ='" . $_POST['txtCategory'] . "' 
    WHERE food_id ='" . $_POST["hidden_id"] . "'";
$itemQuery = $mysqli->query($itemSQL);
header("Location:../items.php");
}
}
?>

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
        <a class="navbar-brand ml-5" href="../index.php">Wongnok Recipe</a>

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
                    <a class="nav-link dropdown-toggle link-unstyled" style="text-decoration: none; color: #eee;" href="#" role="button" data-toggle="dropdown" aria-expanded="false">
                        <?php
                        error_reporting(0);

                        session_start();
                        if ($_SESSION['isLogin'] == 1) {
                            echo  $_SESSION['name'];
                        } else {
                            echo "My Account";
                        }


                        ?>
                    </a>
                    <?php
                    error_reporting(0);

                    session_start();
                    if ($_SESSION['isLogin'] == 1) { ?>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="../items.php">My Profile</a>
                            <a class="dropdown-item" href="#">Favorite</a>
                            <a class="dropdown-item" href="logout.php">Logout</a>
                        </div>
                    <?php
                    } else { ?>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="login.php">Login</a>
                            <a class="dropdown-item" href="register.php">Register</a>
                        </div>
                    <?php
                    }
                    ?>

                </div>
    </nav>

    <br><br>

    <section id="addrecipes">

        <!-- Search Area -->
        <div class="container mt-5">
            <h1 class="card-title text-center"><strong>Edit Recipe</strong></h1><br>
            <form method="post" action="edititems.php?action=edit&id=\" enctype="multipart/form-data">
                <form class="form" role="form" autocomplete="off" id="formPost" method="post" action="edititems.php?action=edit&id=\" enctype="multipart/form-data">
                    <div class="card-body">
                        <?php
                            while ($itemResult = mysqli_fetch_array($itemSQL)) {
                                $recipeID = $itemResult['food_id'];
                                $categoryID = $itemResult['food_category'];
                                $recipeimages = $itemResult['food_img'];
                                $recipeName = $itemResult['food_name'];
                                $recipeIngredients = $itemResult['food_mat'];
                                $recipeStep = $itemResult['food_step'];
                                $recipeTime = $itemResult['food_time'];
                                $recipeLevel = $itemResult['food_level'];
                                $recipeCategory = $itemResult['food_category'];

                        ?>
                            <div class="form-group">
                                <label>Food Name</label>
                                <input name="txtName" id="txtName" type="text" class="form-control form-control-lg rounded-0" required="" value="<?php echo $recipeName; ?>">
                            </div>

                            <div class="form-group">
                                <label>Ingredients</label>
                                <textarea name="txtIng" id="txtIng" class="form-control form-control-lg rounded-0 " required="" maxLength="500" cdkTextareaAutosize><?php echo $recipeIngredients; ?></textarea>

                            </div>

                            <div class="form-group">
                                <label>Step</label>
                                <textarea name="txtStep" id="txtStep" class="form-control form-control-lg rounded-0" required="" maxLength="500" cdkTextareaAutosize><?php echo $recipeStep; ?></textarea>
                            </div>


                            <div class="form-group">
                                <label>Cooking Time</label>
                                <select name="txtTime" type="text" name="txtTime" class="form-control" autocomplete="off" value="<?php echo $recipeTime ?>">
                                    <option value="<?php echo $recipeTime; ?>">
                                        <?php
                                        if ($recipeTime == "1") {
                                            echo "5 - 10 mins";
                                            $recipeTime = "1";
                                        } elseif ($recipeTime == "2") {
                                            echo "10 - 30 mins";
                                            $recipeTime = "2";
                                        } elseif ($recipeTime == "3") {
                                            echo "31 - 60 mins";
                                            $recipeTime = "3";
                                        } elseif ($recipeTime == "4") {
                                            echo "60+ mins";
                                            $recipeTime = "4";
                                        }
                                        ?>
                                    </option>
                                    <option value="1"><?php echo "5 - 10 mins" ?></option>
                                    <option value="2"><?php echo "10 - 30 mins" ?></option>
                                    <option value="3"><?php echo "31 - 60 mins" ?></option>
                                    <option value="4"><?php echo "60+ mins" ?></option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label>Difficulty Level</label>
                                <select name="txtLevel" type="text" name="txtLevel" class="form-control" autocomplete="off" value="<?php echo $recipeLevel ?>">
                                    <option value="<?php echo $recipeLevel; ?>">
                                        <?php
                                        if ($recipeLevel == "1") {
                                            echo "Easy";
                                            $recipeLevel = "1";
                                        } elseif ($recipeLevel == "2") {
                                            echo "Medium";
                                            $recipeLevel = "2";
                                        } elseif ($recipeLevel == "3") {
                                            echo "Hard";
                                            $recipeLevel = "3";
                                        }
                                        ?>
                                    </option>
                                    <option value="1"><?php echo "Easy" ?></option>
                                    <option value="2"><?php echo "Medium" ?></option>
                                    <option value="3"><?php echo "Hard" ?></option>
                                </select>
                                <input type="hidden" name="user_id" value=" <?php echo $_SESSION['userid'] ?> ">
                            </div>

                            <div class="form-group">
                                <label>Category</label>
                                <select name="txtCategory" type="text" name="txtCategory" class="form-control" autocomplete="off" value="<?php echo $recipeCategory ?>">
                                    <option value="<?php echo $recipeCategory; ?>">
                                        <?php
                                        if ($recipeCategory == "1") {
                                            echo "Appetizer Recipes";
                                            $recipeCategory = "1";
                                        } elseif ($recipeCategory == "2") {
                                            echo "Savory Recipes";
                                            $recipeCategory = "2";
                                        } elseif ($recipeCategory == "3") {
                                            echo "Dessert Recipes";
                                            $recipeCategory = "3";
                                        }
                                        ?>
                                    </option>
                                    <option value="1"><?php echo "Appetizer Recipes" ?></option>
                                    <option value="2"><?php echo "Savory Recipes" ?></option>
                                    <option value="3"><?php echo "Dessert Recipes" ?></option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label>Image Food</label><br>
                                <input type="file" name="fileUpload" > <!--required=""-->
                             </div>

                            <br><br>
                            <input type="hidden" name="hidden_id" value="<?php echo $itemResult['food_id']; ?>">
                            <input type="submit" name="edit" class="btn btn-success" value="Edit">
                            <input type="submit" name="Cancle" class="btn btn-danger" value="Cancle">

                    </div>
                </form>
            <?php
                        }
            ?>
    </section>


    <!------------------------------------------------------------------------------------------------------------------------------------>


    <br><br><br><br><br><br>


    <!-- Footer -->
    <footer class="py-4" style="background-color: #262626">
        <div class="container">

            <p class="m-0 text-center text-white"> <?php
                                                    if ($_SESSION['isLogin'] == 0) {
                                                        echo "สวัสดีคณะกรรมการทุก ๆ ท่านครับ -/\-";
                                                    } else {
                                                        echo "สวัสดีคณะกรรมการทุก ๆ ท่านครับ -/\-";
                                                    } ?> </p>



        </div>
    </footer>
    <script src="assets/script.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js" integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous"></script>



</body>

</html>