<!doctype html>
<html>

<head>
    <!-- ... -->
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
    <link href="../styles/main.css" rel="stylesheet" type="text/css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery-cookie/1.4.1/jquery.cookie.min.js"></script>
    <script async src="https://cdn.jsdelivr.net/npm/vanilla-lazyload@16.1.0/dist/lazyload.min.js">
    </script>

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

    <style type="text/css">
        .pic_pos {
            float: left;
            height: 400px;
            width: 400px;
            margin-left: 7%;
            margin-top: 5%;

        }

        #recipe_heading {
            -ms-transform: rotate(55deg);
            -ms-transform-origin: 20% 40%;
            transform: rotate(-25deg);
            transform-origin: 90% 65%;
        }

        .content_pos {
            float: right;
            margin-right: 30%;
            margin-top: 5%;

        }

        .background_color_matcher {
            background-color: #fff7d0;
        }

        .ingredients_box {
            margin-top: 5%;
            margin-right: 10%;
            float: right;
            width: 49%;
            height: 300px;
            overflow: scroll;

        }

        .table {
            border-spacing: 0 15px;
        }

        i {
            font-size: 1rem !important;
        }

        .table tr {
            border-radius: 20px;
        }

        tr td:nth-child(n+5),
        tr th:nth-child(n+5) {
            border-radius: 0 .625rem .625rem 0;
        }

        tr td:nth-child(1),
        tr th:nth-child(1) {
            border-radius: .625rem 0 0 .625rem;
        }


        #instruction_table {
            font-family: arial, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        .instr_table_cont {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }
    </style>

</head>

<body class="bg-blue-50 overflow-x-hidden">
    <!-- Header Navigation Section -->
    <header>
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
                                <a class="dropdown-item" href="items.php">My Profile</a>
                                <a class="dropdown-item" href="#">Favorite</a>
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
        <!-- mobile menu -->

        </nav>
    </header>
    <?php
    session_start();
    error_reporting(0);

    $_SESSION['queryComment'] = "";
    $_SESSION['queryComment'] = $_POST['hidden_id']; 

    include "controls/dbconnect.php";
    $mysqli = new mysqli($servername, $username, $password, $database);
    $mysqli->set_charset("UTF8");



    // $queryItem = "SELECT * FROM foodrecipes WHERE food_id  = '" . $_POST['hidden_id'] . "' OR food_id = '".$_SESSION['id_back_comment']."'";
    $queryItem = "SELECT foodrecipes.food_id,foodrecipes.food_name,foodrecipes.food_img,foodrecipes.food_mat,foodrecipes.food_step,
                                foodrecipes.food_time,foodrecipes.food_level,foodrecipes.food_category,foodrecipes.food_by,
                        rating.rat_id_food,rating.rat_score,rating.rat_comment,rating.rat_by 
                    FROM foodrecipes,rating 
                    WHERE foodrecipes.food_id  = '" . $_POST['hidden_id'] . "' OR foodrecipes.food_id = '".$_SESSION['id_back_comment']."' 
                    AND rating.rat_id_food = '".$_POST['hidden_id']."' OR rating.rat_id_food = '".$_SESSION['id_back_comment']."'";
    $itemSQL = $mysqli->query($queryItem);
  
    while ($itemResult = mysqli_fetch_array($itemSQL)) {
        $recipeID = $itemResult['food_id'];
        $categoryID = $itemResult['food_category'];
        $recipeimages = $itemResult['food_img'];
        $recipeName = $itemResult['food_name'];
        $recipeIngredients = $itemResult['food_mat'];
        $recipeStep = $itemResult['food_step'];
        $recipeScore = $itemResult['food_score'];
        $recipeTime = $itemResult['food_time'];
        $recipeLevel = $itemResult['food_level'];
        $recipeBy = $itemResult['food_by'];
        $ratIdFood = $itemResult['rat_id_food'];
        $ratScore = $itemResult['rat_score'];
        $ratComment = $itemResult['rat_comment'];
        $ratBy = $itemResult['rat_by'];        
        $categoryName = "";
        $recipetxtTime = "";
        $recipetxtLevel = "";
        if ($categoryID == "1") {
            $categoryName = "อาหารว่าง";
        } elseif ($categoryID == "2") {
            $categoryName = "อาหารคาว";
        } elseif ($categoryID == "3") {
            $categoryName = "อาหารหวาน";
        }
        if ($recipeLevel == "1") {
            $recipetxtLevel = "Easy";
        } elseif ($recipeLevel == "2") {
            $recipetxtLevel = "Medium";
        } elseif ($recipeLevel == "3") {
            $recipetxtLevel = "Hard";
        }
        if ($recipeTime == "1") {
            $recipetxtTime = "5 - 10 mins";
        } elseif ($recipeTime == "2") {
            $recipetxtTime = "10 - 30 mins";
        } elseif ($recipeTime == "3") {
            $recipetxtTime = "30 - 60 mins";
        } elseif ($recipeTime == "4") {
            $recipetxtTime = "60+ mins";
        }
    
    }
    ?>
    <!--Dish Details-->
    <div><br><br>
        <div class="flex pt-5 md:pt-12 justify-center">
            <div class="bg-white md:h-96 w-11/12 md:w-7/10 md:mx-8 md:flex md:max-w-5xl shadow-lg rounded-lg">
                <div class="md:w-1/2 h-64 rounded-t-lg md:rounded-t-none md:rounded-tl-lg md:rounded-bl-lg md:h-auto overflow-hidden">
                    <img id="dish-page-image" class="object-cover" src="controls/img/<?php echo $recipeimages; ?>" style="height: 100%;">
                </div>
                <div class="mb-4 pt-5 px-6 max-w-xl md:max-w-5xl md:w-1/2" style="overflow: scroll">
                    <h2 id="dish-page-name" class="text-3xl font-medium text-gray-800"><?php echo $recipeName; ?></h2>
                    <span id="dish-page-prep-time" class="bg-green-400 text-gray-50 text-sm font-light rounded-md px-2 py-1"><?php echo $recipetxtLevel; ?></span>
                    <span id="dish-page-cuisine-type" class="bg-green-400 text-gray-50 text-sm font-light rounded-md px-2 py-1"><?php echo $recipetxtTime; ?></span>
                    <span id="dish-page-cuisine-type" class="bg-green-400 text-gray-50 text-sm font-light rounded-md px-2 py-1"><?php echo $categoryName; ?></span>
                    <p id="dish-page-ingredients" class="mt-4 text-gray-600 text-base font-regular">
                    <h4>Ingredients</h4>
                    <h4></h4>
                    <?php echo nl2br($recipeIngredients) ?>
                    </p>

                </div>
            </div>
        </div>
    </div>

    <!-- end of ingredients box-->

    <!-- start of dish directions box -->

    <div>
        <div class="py-5 flex justify-center">
            <div class="bg-white w-11/12 md:w-7/10 md:mx-8 md:flex md:max-w-5xl shadow-lg rounded-lg">
                <div class="pt-5 px-6 max-w-xl lg:max-w-5xl mb-4">
                    <h2 class="text-2xl font-medium text-blue-600">Cooking Steps<span class="text-indigo-600"></span></h2>
                    <span id="dish-page-video-present" class="hidden bg-green-400 text-gray-50 text-sm font-light rounded-md px-2 py-1">Video</span>
                    <p id="dish-page-direction-text" class="mt-4 font-regular text-base">
                        <?php echo nl2br($recipeStep) ?>
                    </p>
                    <!-- video section -->




                    <div class="flex flex-row mt-8">
                        <div class="w-8/12 md:w-10/12 ml-2">
                            <p id="dish-page-owner-caption" class="text-sm font-light text-gray-600 truncate overflow-ellipsis">
                                Create By <?php echo $itemResult['acc_name']; ?>
                            </p>
                            <h2 id="dish-page-owner-name" class="text-gray-800 text-lg font-medium mb-2 cursor-pointer"><a href="index.php?name=<?php echo $recipeBy; ?> ">
                                    <?php echo $recipeBy; ?> </a>
                            </h2>
                        </div>
                    </div>

                    <div class="mt-8 flex flex-row">
                        <svg id="dish-page-like-btn" onClick="toggleLikeButton(this)" class="w-6 h-6 cursor-pointer" fill="#FFFFFF" stroke="#EC4899" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path>
                        </svg>
                        <span id="dish-page-num-likes" class="ml-2">0</span>
                        <!-- <svg class="w-6 h-6 stroke-current text-pink-500 fill-current text-white" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M3.172 5.172a4 4 0 015.656 0L10 6.343l1.172-1.171a4 4 0 115.656 5.656L10 17.657l-6.828-6.829a4 4 0 010-5.656z" clip-rule="evenodd"></path></svg> -->
                    </div>

                </div>

                <!--Like button-->
            </div>
        </div>
    </div>

 

    <!--Comments-->
    <div class="py-5 flex justify-center">
        <div class="w-11/12 md:w-7/10 md:mx-8 md:flex md:max-w-5xl shadow-lg rounded-lg">
            <form class="w-full bg-white rounded-lg px-4 pt-2" method="post" action="controls/addcomment.php">
                <div class="flex flex-wrap -mx-3 mb-6">
                    <h2 class="px-4 pt-3 pb-2 text-gray-800 text-lg font-medium">Add a new comment</h2>
                    <div class="w-full md:w-full px-3 mb-2 mt-2">
                        <textarea id="dish-new-comment-text" class="bg-gray-100 rounded border border-gray-400 leading-normal 
                                resize-none w-full h-20 py-2 px-3 font-regular placeholder-gray-700 focus:outline-none focus:bg-white" name="txtComment" placeholder='Type Your Comment' required></textarea>
                    </div>
                    <!-- partial:index.partial.html --> <!-- Style Rating Recipes -->
                    <style> 
                        .star-rating {
                            white-space: nowrap;
                        }

                        .star-rating [type="radio"] {
                            appearance: none;
                        }

                        .star-rating i {
                            font-size: 1.2em;
                            transition: 0.3s;
                        }

                        .star-rating label:is(:hover, :has(~ :hover)) i {
                            transform: scale(1.35);
                            color: #fffdba;
                            animation: jump 0.5s calc(0.3s + (var(--i) - 1) * 0.15s) alternate infinite;
                        }

                        .star-rating label:has(~ :checked) i {
                            color: #faec1b;
                            text-shadow: 0 0 2px #ffffff, 0 0 10px #ffee58;
                        }

                        @keyframes jump {

                            0%,
                            50% {
                                transform: translatey(0) scale(1.35);
                            }

                            100% {
                                transform: translatey(-15%) scale(1.35);
                            }
                        }
                    </style>
                    <!-- Rating Recipes -->
                    <p>Rating: <span class="star-rating">
                            <label for="rate-1" style="--i:1"><i class="fa-solid fa-star"></i></label>
                            <input type="radio" name="rating" id="rate-1" value="1">
                            <label for="rate-2" style="--i:2"><i class="fa-solid fa-star"></i></label>
                            <input type="radio" name="rating" id="rate-2" value="2" checked>
                            <label for="rate-3" style="--i:3"><i class="fa-solid fa-star"></i></label>
                            <input type="radio" name="rating" id="rate-3" value="3">
                            <label for="rate-4" style="--i:4"><i class="fa-solid fa-star"></i></label>
                            <input type="radio" name="rating" id="rate-4" value="4">
                            <label for="rate-5" style="--i:5"><i class="fa-solid fa-star"></i></label>
                            <input type="radio" name="rating" id="rate-5" value="5">
                        </span></p>
                    <!-- partial -->
                    <div class="w-full md:w-full flex items-start md:w-full px-3">
                        <div class="flex items-start w-1/2 text-gray-700 px-2 mr-auto">
                            <svg fill="none" class="w-5 h-5 text-gray-600 mr-1" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                            <p class="text-xs md:text-sm pt-px">You must be logged in to comment.</p>
                        </div>
                        <div class="-mr-1">
                            <input type="hidden" name="hidden_by" value="<?php echo $_SESSION['name']; ?>">
                            <input type="hidden" name="hidden_id_food" value="<?php echo $recipeID; ?>">
                            <input onClick="onCommentSubmitted()" type='submit' class="bg-blue-600 text-white font-medium py-1 px-4 border rounded-lg tracking-wide mr-1 hover:bg-blue-700 cursor-pointer" value='Post Comment'>
                        </div>
                    </div>
                    
            </form>
            
    
            <!--Previously added comments-->
            
            
                         
                <?php if($ratIdFood == $_POST['hidden']){?>
            <p id="dish-no-comments" class="mx-auto text-center text-sm font-medium text-gray-400 mt-4">No Comments</p>
            <?php }else{ ?>
                <div id="dish-comments" class="w-full px-4 pt-2 pb-2 mt-4">
                <div class="flex flex-row w-full p-2">
					<img class="w-14 md:w-20 h-14 md:h-20 mr-2 object-cover rounded-full cursor-pointer" src="../assets/images/default-profile.jpeg" />
					
                    <div class="ml-2">
						<h2 class="text-gray-800 text-lg font-medium mb-2 cursor-pointer"><?php echo $ratBy ?></h2>
						<p class="font-regular text-gray-600"><?php echo $ratComment ?></p>
                        
					</div>
				</div>
            </div>
<?php }?>

            
            
        </div>
    </div>
    </div>
 
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

    <script type="text/javascript" src='../scripts/loginHandler.js'></script>
    <script type="text/javascript" src='../scripts/dishPageHandler.js'></script>

</body>

</html>