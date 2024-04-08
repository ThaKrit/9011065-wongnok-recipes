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
                        <img src="images/card4.jpg" class="d-block w-100" >
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

    <section id="category">
                
        <!-- Category Area -->
        <div class="container mt-5">
    <h1 class="card-title text-center"><strong>Category</strong></h1><br>
            <div class="row">
                <div class="col-md-4 mb-4">
                    <div class="card">
                        <img src="images/appetizer.jpg" class="card-img-top" alt="..." style="height: 240px">
                        <div class="card-body">
                            <h5 class="card-title text-center"><strong>Appetizer Recipes</strong></h5>
                            <a class="btn btn-dark btn-block" href="allitems.php">View List</a>
                        </div>
                    </div>
                </div>

                <div class="col-md-4 mb-4">
                    <div class="card">
                        <img src="images/dinner.jpg" class="card-img-top" alt="..." style="height: 240px">
                        <div class="card-body">
                            <h5 class="card-title text-center"><strong>Savory Recipes</strong></h5>
                            <a class="btn btn-dark btn-block" href="allitems.php">View List</a>
                        </div>
                    </div>
                </div>

                <div class="col-md-4 mb-4">
                    <div class="card">
                        <img src="images/dessert.jpeg" class="card-img-top" alt="..." style="height: 240px">
                        <div class="card-body">
                            <h5 class="card-title text-center"><strong></strong>Dessert Recipes</h5>
                            <a class="btn btn-dark btn-block" href="allitems.php">View List</a>
                        </div>
                    </div>
                </div>

    </section>


    <section id="Search">
                
        <!-- Search Area -->
        <div class="container mt-5">
    <h1 class="card-title text-center"><strong>Search</strong></h1><br>
    <form class="form" role="form" autocomplete="off" id="formPost" method="post" action="allitems.php?action=search" enctype="multipart/form-data">
            <div class="input-group input-group-sm">
                <input type="text" id="txtSearch" name="txtSearch" class="form-control" aria-label="Small" aria-describedby="inputGroup-sizing-sm"
                    placeholder="Search...">
                <div class="input-group-append">
                    <button type="submit" name="searchName" class="btn btn-success btn-number">
                        <i class="fa fa-search"></i>
                    </button>
                </div>
            </div>
            
        </form>
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