<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Settings -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="theme-color" content="#21232E">

    <!-- Website -->
    <title>Wongnok_recipes</title>
    <link rel="icon" href="images/fav.png" type="image/x-icon">

    <!-- Bootstrap core CSS -->
    <link href="assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">

    <!-- Custom Styles -->
    <link href="assets/css/style.css" rel="stylesheet">
</head>

<body>
    <nav class="navbar navbar-expand-md navbar-dark" style="background-color: #262626">
        <div class="container">
            <a class="navbar-brand" href="index.php">Wongnok recipes</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault"
                aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse justify-content-end" id="navbarsExampleDefault">
                <ul class="navbar-nav m-auto">
                    
                </ul>

                <form class="form-inline my-2 my-lg-0">
                    <a class="btn btn-success btn-sm ml-3" href="#">Register</a>
                    <a class="btn btn-success btn-sm ml-3" href="login.php">Login</a>
                </form>
            </div>
        </div>
    </nav>
    <br>

    <div class="container">
        <div class="col-md-8 mx-auto">
            <span class="anchor" id="formRegister"></span>
            <div class="card rounded-0">
                <div class="card-header">
                    <h3 class="mb-0">Register</h3>
                </div>
                <div class="card-body">
                    <form class="form" role="form" autocomplete="off" id="formRegister" method="post" action="controls/register.php">
                        <div class="form-group">
                            <label for="uname1">Username</label>
                            <input name="txtUsername" id="txtUsername" type="text" class="form-control form-control-lg rounded-0" required="">
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input name="txtPassword" id="txtPassword" type="password" class="form-control form-control-lg rounded-0" autocomplete="new-password">
                        </div>
                        <div class="form-group">
                            <label>Confirm Password</label>
                            <input name="txtConPassword" id="txtConPassword" type="password" class="form-control form-control-lg rounded-0" required=""
                                autocomplete="new-password">
                        </div>
                        <div class="form-group">
                            <label for="uname1">Name</label>
                            <input name="txtName" id="txtName" type="text" class="form-control form-control-lg rounded-0" required="">
                        </div>
                        <div class="form-group">
                            <label for="uname1">Lastname</label>
                            <input name="txtLastname" id="txtLastname" type="text" class="form-control form-control-lg rounded-0" required="">
                        </div>
                        <div class="form-group">
                            <label for="uname1">Address</label>
                            <input name="txtAddress" id="txtAddress" type="text" class="form-control form-control-lg rounded-0" required="">
                        </div>
                        <button type="submit" name="submit" value="save" class="btn btn-success btn-lg float-right">Register</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <br>
    <!-- Footer -->
    <footer class="py-4" style="background-color: #262626">
        <div class="container">
            <p class="m-0 text-center text-white">&copy; Wongnok recipes</p>
        </div>
    </footer>
    <!-- End Footer -->

    <!-- Custom JavaScript -->
    <script src="assets/jquery/scrolling-nav.js"></script>
</body>

</html>