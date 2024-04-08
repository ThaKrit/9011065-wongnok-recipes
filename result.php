<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Settings -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="theme-color" content="#21232E">

    <!-- OOAD -->
    <title>Wongnok Recipes</title>

    <!-- Bootstrap core CSS -->
    <link href="assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">

    <!-- Custom Styles -->
    <link href="assets/css/style.css" rel="stylesheet">
</head>

<body id="page-top">
    <header class="text-white" style="background-color: #262626">
        <div class="container text-center">
            <div id="carouselControls" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <h1>ERROR!!</h1>
                        <?php
                            session_start();
                            echo "<p class=\"lead\">" .$_SESSION['result']. "</p>";
                        ?>
                            <img class="d-block w-100" src="" alt="">
                    </div>
                    
                </div>
            </div>
    </header>

    <section id="login" class="bg-light">
        <div class="container">
            <div class="col-md-6 mx-auto">
                <?php
                error_reporting(0);
                session_start();
                if($_SESSION['check'] == "true") {
                    $_SESSION['check'] = "false";
                    echo "
                    <a href=\"index.php\" style=\"color: #FFF\">
                    <button class=\"btn btn-danger btn-lg btn-block\">Back to Home</button>
                    </a>";
                } else {
                    echo "
                    <a href=\"login.php\" style=\"color: #FFF\">
                    <button class=\"btn btn-danger btn-lg btn-block\">Back to Login</button>
                    </a>";
                }
            ?>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="py-4" style="background-color: #262626">
        <div class="container">
            <p class="m-0 text-center text-white">&copy; Wongnok Recipes</p>
        </div>
    </footer>
    <!-- End Footer -->

    <!-- Bootstrap core JavaScript -->
    <script src="assets/jquery/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Plugin JavaScript -->
    <script src="assets/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom JavaScript -->
    <script src="assets/jquery/scrolling-nav.js"></script>
</body>

</html>