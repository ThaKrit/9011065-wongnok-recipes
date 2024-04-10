<?php
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
                    ?>