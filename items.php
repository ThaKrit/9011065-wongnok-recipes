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
                            <a class="dropdown-item" href="items.php">My Recipes</a> 
                            <a class="dropdown-item" href="controls/logout.php">Logout</a>
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
    <br>


    <section id="food">
        <div class="container mt-5">
            <h1 class="text-center"><strong>My Food Lists</strong></h1>
            <div class="mt-4">
                <div class="row">
                    <div class="col-md-2 mr-auto">
                        <form class="form" method="post" action="testitems.php" enctype="multipart/form-data">
                            <input type="submit" name="addrecipe" value="Add Recipe" class="btn btn-add-food btn-secondary">
                        </form>
                    </div>
                    <div class="col-md-2">
                        <form class="form" role="form" autocomplete="off" id="formPost" method="post" action="#">
            <div class="input-group input-group-sm">
                <input type="text" id="txtName" name="txtName" class="form-control" aria-label="Small" aria-describedby="inputGroup-sizing-sm"
                    placeholder="Search...">
                <div class="input-group-append">
                    <button type="submit" name="searchName" class="btn btn-success btn-number">
                        <i class="fa fa-search"></i>
                    </button>
                </div>
            </div>
            
        </form>
                    </div>
                </div>
            </div>


            <table id="foodListTable" class="table table-responsive mt-4" style="text-align:center;">
                <thead>
                    <tr>
                        <th scope="col" style="width: 10%;">Recipe images</th>
                        <th scope="col" style="width: 10%;">Recipe Name</th>
                        <th scope="col" style="width: 10%;">Category</th>
                        <th scope="col" style="width: 10%;">Action</th>
                    </tr>
                </thead>
                <?php

                if (isset($_POST['delete'])) {
                    session_start();
                    $_SESSION['food_id'] = $_POST['hidden_id'];
                    header("Location:controls/deleteitems.php");
                } elseif (isset($_POST['edit'])) {
                    session_start();
                    $_SESSION['food_id'] = $_POST['hidden_id'];
                    header("Location:controls/edititems.php");
                    echo "Edit";
                }

                ?>
                <tbody>

                    <?php
                    error_reporting(0);
                    session_start();

                    include "controls/dbconnect.php";
                    $mysqli = new mysqli($servername, $username, $password, $database);
                    $mysqli->set_charset("UTF8");

                    $queryItem = "SELECT * FROM foodrecipes WHERE food_by = '" . $_SESSION['name'] . "' ";
                    $itemSQL = $mysqli->query($queryItem);


                    while ($itemResult = mysqli_fetch_array($itemSQL)) {
                        $recipeID = $itemResult['food_id'];
                        $categoryID = $itemResult['food_category'];
                        $categoryName = $itemResult['food_category'];
                        $recipeimages = $itemResult['food_img'];
                        $recipeName = $itemResult['food_name'];
                        $recipeIngredients = $itemResult['food_mat'];
                    ?>

                        <tr>
                            <form method="post" action="items.php?action=edit&id=\">
                                <td id="recipeimages-<?= $recipeID ?>"><img src="controls/img/<?php echo $recipeimages ?>" class="img-fluid" style="height: 100px" alt="Recipe images"></td>
                                <td id="recipeName-<?= $recipeID ?>"><?php echo $recipeName ?></td>
                                <!-- Category Food -->
                                <td id="categoryName-<?= $recipeID ?>"><?php if ($categoryName == "1") {
                                                                            echo "Appetizer Recipes";
                                                                        } elseif ($categoryName == "2") {
                                                                            echo "Savory Recipes";
                                                                        } elseif ($categoryName == "3") {
                                                                            echo "Dessert Recipes";
                                                                        } ?></td>



                                <td>
                                    <input type="hidden" name="hidden_id" value="<?php echo $itemResult['food_id']; ?>">
                                    <input type="submit" name="edit" class="btn btn-warning" value="Edit">
                                    <input type="submit" name="delete" class="btn btn-danger" value="Delete" onclick="return confirm('Are You Sure to delete ?')">
                                </td>
                            </form>
                        </tr>

                    <?php
                    }
                    ?>

                </tbody>
            </table>
        </div>

    </section>
    <section id="addRecipeModal"></section>

    <br><br><br><br><br><br>
    <!-- Footer -->
    <footer class="py-4" style="background-color: #262626">
        <div class="container">

            <p class="m-0 text-center text-white">&copy; <?php
                                                            if ($_SESSION['isLogin'] == 0) {
                                                                echo "Wongnok recipes";
                                                            } else {
                                                                if ($_SESSION['isadd'] == 0) {
                                                                    echo "Wongnok recipes";
                                                                } else if ($_SESSION['isadd'] == 1) {
                                                                    echo "Wongnok recipes";
                                                                } else {
                                                                    echo "Wongnok recipes";
                                                                }
                                                            } ?> </p>



        </div>
    </footer>
    <script src="assets/script.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js" integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous"></script>



</body>

</html>