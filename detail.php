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


    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Wongnok Recipes</title>

    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- Style CSS -->
    <link rel="stylesheet" href="assets/style.css">

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
    <br><br><br>
    <?php // Query Database
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
                    WHERE foodrecipes.food_id  = '" . $_POST['hidden_id'] . "' AND rating.rat_id_food  = '" . $_POST['hidden_id'] . "'";

                    unset($_SESSION['id_back_comment']);
    $itemSQL = $mysqli->query($queryItem);
    
                        
    
    
    $ratIdFood = "";

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
        $showComment = [
        ["ratIdFood" => $itemResult['rat_id_food'],
        "ratScore" => $itemResult['rat_score'],
        "ratComment" => $itemResult['rat_comment'],
        "ratBy" => $itemResult['rat_by']],
        ];
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
                                Create By <?php echo $recipeBy ?>
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
                    <div class="w-full md:w-full flex items-start md:w-full px-3">
                        <div class="flex items-start w-1/2 text-gray-700 px-2 mr-auto">
                             <!-- Rating Recipes -->
                    <p>Rating for this recipe : <span class="star-rating">
                            <label for="rate-1" style="--i:1"><i class="fa-solid fa-star"></i></label>
                            <input type="radio" name="rating" id="rate-1" value="1">
                            <label for="rate-2" style="--i:2"><i class="fa-solid fa-star"></i></label>
                            <input type="radio" name="rating" id="rate-2" value="2" >
                            <label for="rate-3" style="--i:3"><i class="fa-solid fa-star"></i></label>
                            <input type="radio" name="rating" id="rate-3" value="3">
                            <label for="rate-4" style="--i:4"><i class="fa-solid fa-star"></i></label>
                            <input type="radio" name="rating" id="rate-4" value="4">
                            <label for="rate-5" style="--i:5"><i class="fa-solid fa-star"></i></label>
                            <input type="radio" name="rating" id="rate-5" value="5">
                        </span></p>
                        </div>
                        <div class="-mr-1">
                            <input type="hidden" name="hidden_by" value="<?php echo $_SESSION['name']; ?>">
                            <input type="hidden" name="hidden_id_food" value="<?php echo $recipeID; ?>">
                            <input onClick="onCommentSubmitted()" type='submit' class="bg-blue-600 text-white font-medium py-1 px-4 border rounded-lg tracking-wide mr-1 hover:bg-blue-700 cursor-pointer" value='Post Comment'>
                        </div>
                    </div>
                    
            </form>
            

            

            <!--Previously added comments-->
            
            <p id="dish-no-comments" class="mx-auto text-center text-sm font-medium text-gray-400 mt-4">No Comments</p>
            
                <div id="dish-comments" class="w-full px-4 pt-2 pb-2 mt-4">
                
                        <?php 
                            foreach($showComment as $index => $value): ?>
                            
                        <?php 
                            if($value["ratIdFood"] == $_POST['hidden_id']){?>
                                <div class="flex flex-row w-full p-2">
					                <img class="w-14 md:w-20 h-14 md:h-20 mr-2 object-cover rounded-full cursor-pointer" src="../assets/images/default-profile.jpeg" />
					                    <div class="ml-2">
						                    <h2 class="text-gray-800 text-lg font-medium mb-2 cursor-pointer"><?php echo $value["ratBy"];?></h2>
                                            <p class="font-regular text-gray-600"><?php echo $value["ratComment"]; ?></p>
						                        <p class="font-regular text-gray-600">
                                <?php
                                                if($value['ratScore'] == "5"){?>
                                                    <p>Rating <span class="star-rating">
                                                        <label for="rate-1" style="--i:1"><i class="fa-solid fa-star"></i></label>
                                                        <input type="radio" name="rating1" id="rate-1" value="1">
                                                        <label for="rate-2" style="--i:2"><i class="fa-solid fa-star"></i></label>
                                                        <input type="radio" name="rating1" id="rate-2" value="2" >
                                                        <label for="rate-3" style="--i:3"><i class="fa-solid fa-star"></i></label>
                                                        <input type="radio" name="rating1" id="rate-3" value="3">
                                                        <label for="rate-4" style="--i:4"><i class="fa-solid fa-star"></i></label>
                                                        <input type="radio" name="rating1" id="rate-4" value="4">
                                                        <label for="rate-5" style="--i:5"><i class="fa-solid fa-star"></i></label>
                                                        <input type="radio" name="rating1" id="rate-5" value="5" checked>
                                                    </span></p>

                        <?php    
                                                }elseif($value['ratScore'] == "4"){?>
                                                    <p>Rating <span class="star-rating">
                                                        <label for="rate-1" style="--i:1"><i class="fa-solid fa-star"></i></label>
                                                        <input type="radio" name="rating1" id="rate-1" value="1">
                                                        <label for="rate-2" style="--i:2"><i class="fa-solid fa-star"></i></label>
                                                        <input type="radio" name="rating1" id="rate-2" value="2" >
                                                        <label for="rate-3" style="--i:3"><i class="fa-solid fa-star"></i></label>
                                                        <input type="radio" name="rating1" id="rate-3" value="3">
                                                        <label for="rate-4" style="--i:4"><i class="fa-solid fa-star"></i></label>
                                                        <input type="radio" name="rating1" id="rate-4" value="4"checked>
                                                        <label for="rate-5" style="--i:5"><i class="fa-solid fa-star"></i></label>
                                                        <input type="radio" name="rating1" id="rate-5" value="5" >
                                                    </span></p>

                        <?php    
                                                }elseif($value['ratScore'] == "3"){?>
                                                    <p>Rating <span class="star-rating">
                                                        <label for="rate-1" style="--i:1"><i class="fa-solid fa-star"></i></label>
                                                        <input type="radio" name="rating1" id="rate-1" value="1">
                                                        <label for="rate-2" style="--i:2"><i class="fa-solid fa-star"></i></label>
                                                        <input type="radio" name="rating1" id="rate-2" value="2" >
                                                        <label for="rate-3" style="--i:3"><i class="fa-solid fa-star"></i></label>
                                                        <input type="radio" name="rating1" id="rate-3" value="3" checked>
                                                        <label for="rate-4" style="--i:4"><i class="fa-solid fa-star"></i></label>
                                                        <input type="radio" name="rating1" id="rate-4" value="4">
                                                        <label for="rate-5" style="--i:5"><i class="fa-solid fa-star"></i></label>
                                                        <input type="radio" name="rating1" id="rate-5" value="5" >
                                                    </span></p>

                        <?php    
                                                }elseif($value['ratScore'] == "2"){?>
                                                    <p>Rating <span class="star-rating">
                                                        <label for="rate-1" style="--i:1"><i class="fa-solid fa-star"></i></label>
                                                        <input type="radio" name="rating1" id="rate-1" value="1">
                                                        <label for="rate-2" style="--i:2"><i class="fa-solid fa-star"></i></label>
                                                        <input type="radio" name="rating1" id="rate-2" value="2" checked>
                                                        <label for="rate-3" style="--i:3"><i class="fa-solid fa-star"></i></label>
                                                        <input type="radio" name="rating1" id="rate-3" value="3">
                                                        <label for="rate-4" style="--i:4"><i class="fa-solid fa-star"></i></label>
                                                        <input type="radio" name="rating1" id="rate-4" value="4">
                                                        <label for="rate-5" style="--i:5"><i class="fa-solid fa-star"></i></label>
                                                        <input type="radio" name="rating1" id="rate-5" value="5" >
                                                    </span></p>

                        <?php    
                                                }elseif($value['ratScore'] == "1"){?>
                                                    <p>Rating <span class="star-rating">
                                                        <label for="rate-1" style="--i:1"><i class="fa-solid fa-star"></i></label>
                                                        <input type="radio" name="rating1" id="rate-1" value="1" checked>
                                                        <label for="rate-2" style="--i:2"><i class="fa-solid fa-star"></i></label>
                                                        <input type="radio" name="rating1" id="rate-2" value="2">
                                                        <label for="rate-3" style="--i:3"><i class="fa-solid fa-star"></i></label>
                                                        <input type="radio" name="rating1" id="rate-3" value="3">
                                                        <label for="rate-4" style="--i:4"><i class="fa-solid fa-star"></i></label>
                                                        <input type="radio" name="rating1" id="rate-4" value="4">
                                                        <label for="rate-5" style="--i:5"><i class="fa-solid fa-star"></i></label>
                                                        <input type="radio" name="rating1" id="rate-5" value="5">
                                                    </span></p>

                        <?php
                                                }
                        }
                        ?>
                        <?php 
                            endforeach;
                        ?>
                            
                        
                    </div>
				</div>
                
            </div>
            
            
        </div>
    </div>
    </div>

    <!-- Foooter -->
    <section class="bg-blue-600">
        <div class="max-w-screen-xl px-4 py-12 mx-auto space-y-8 overflow-hidden sm:px-6 lg:px-8">
            <div class="flex justify-center mt-8 space-x-6">
                <a href="https://www.facebook.com/laymanbrother.19/" class="text-gray-50 hover:text-white">
                    <span class="sr-only">Facebook</span>
                    <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 24 24">
                        <path fill-rule="evenodd" d="M22 12c0-5.523-4.477-10-10-10S2 6.477 2 12c0 4.991 3.657 9.128 8.438 9.878v-6.987h-2.54V12h2.54V9.797c0-2.506 1.492-3.89 3.777-3.89 1.094 0 2.238.195 2.238.195v2.46h-1.26c-1.243 0-1.63.771-1.63 1.562V12h2.773l-.443 2.89h-2.33v6.988C18.343 21.128 22 16.991 22 12z" clip-rule="evenodd"></path>
                    </svg>
                </a>
                <a href="https://twitter.com/ashutosh_1919" class="text-gray-50 hover:text-white">
                    <span class="sr-only">Twitter</span>
                    <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M8.29 20.251c7.547 0 11.675-6.253 11.675-11.675 0-.178 0-.355-.012-.53A8.348 8.348 0 0022 5.92a8.19 8.19 0 01-2.357.646 4.118 4.118 0 001.804-2.27 8.224 8.224 0 01-2.605.996 4.107 4.107 0 00-6.993 3.743 11.65 11.65 0 01-8.457-4.287 4.106 4.106 0 001.27 5.477A4.072 4.072 0 012.8 9.713v.052a4.105 4.105 0 003.292 4.022 4.095 4.095 0 01-1.853.07 4.108 4.108 0 003.834 2.85A8.233 8.233 0 012 18.407a11.616 11.616 0 006.29 1.84"></path>
                    </svg>
                </a>
                <a href="https://github.com/ashutosh1919" class="text-gray-50 hover:text-white">
                    <span class="sr-only">GitHub</span>
                    <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 24 24">
                        <path fill-rule="evenodd" d="M12 2C6.477 2 2 6.484 2 12.017c0 4.425 2.865 8.18 6.839 9.504.5.092.682-.217.682-.483 0-.237-.008-.868-.013-1.703-2.782.605-3.369-1.343-3.369-1.343-.454-1.158-1.11-1.466-1.11-1.466-.908-.62.069-.608.069-.608 1.003.07 1.531 1.032 1.531 1.032.892 1.53 2.341 1.088 2.91.832.092-.647.35-1.088.636-1.338-2.22-.253-4.555-1.113-4.555-4.951 0-1.093.39-1.988 1.029-2.688-.103-.253-.446-1.272.098-2.65 0 0 .84-.27 2.75 1.026A9.564 9.564 0 0112 6.844c.85.004 1.705.115 2.504.337 1.909-1.296 2.747-1.027 2.747-1.027.546 1.379.202 2.398.1 2.651.64.7 1.028 1.595 1.028 2.688 0 3.848-2.339 4.695-4.566 4.943.359.309.678.92.678 1.855 0 1.338-.012 2.419-.012 2.747 0 .268.18.58.688.482A10.019 10.019 0 0022 12.017C22 6.484 17.522 2 12 2z" clip-rule="evenodd"></path>
                    </svg>
                </a>

            </div>
            <p class="mt-8 text-base leading-6 text-center text-gray-50">
                © 2021 FoodLovers, Inc. All rights reserved.
            </p>

    </section>

    <script type="text/javascript" src='../scripts/loginHandler.js'></script>
    <script type="text/javascript" src='../scripts/dishPageHandler.js'></script>

</body>

</html>