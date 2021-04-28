<?php
include "partials/header.php";
include "partials/menu.php";

$sql_category="select * from category";
$res_category=mysqli_query($conn,$sql_category);
$sql_news="select * from posts";
$res_news=mysqli_query($conn,$sql_news);
$sql_comments="select * from comments";
$res_comments=mysqli_query($conn,$sql_comments);



?>
        <!-- Main Content Section Starts -->
        <div class="main-content">
            <div class="wrapper">
                <h1>Dashboard</h1>
                <br><br>

                <br><br>

                <div class="col-4 text-center">



                    <h1> <?php echo $res_category->num_rows?></h1>
                    <br />

                    Categories
                </div>

                <div class="col-4 text-center">


                    <h1><?php echo $res_news->num_rows?></h1>
                    <br />
                    posts
                </div>

                <div class="col-4 text-center">



                    <h1><?php echo $res_comments->num_rows?></h1>
                    <br />
                    Total comments
                </div>


                <div class="clearfix"></div>

            </div>
        </div>
        <!-- Main Content Setion Ends -->
