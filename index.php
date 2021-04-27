<?php
session_start();
include("includes/db.php");
include("functions/functions.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E Commerce Store</title>

<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<link rel="stylesheet" href="styles/style.css">
<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<!-- Font awesome -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
</head>

<body>
    <div id="top"> <!-- Top Bar Start -->
        <div class="container"><!-- Container Start -->
            <div class="col-md-6 offer">
                <a href="#" class="btn btn-success btn-sm">
                    <?php
                        if(!isset($_SESSION['customer_email'])){
                            echo "Welcome Guest";
                        }else{
                            echo "Welcome: " .$_SESSION['customer_email'] . "";
                        }
                    ?>
                </a>
                <a href="#"> Shopping Cart Total Price: INR <?php totalPrice(); ?>, Total Items <?php item(); ?> </a>
            </div>

            <div class="col-md-6">
                <ul class="menu">
                    <li>
                        <a href="customer_registration.php"> Register</a>
                    </li>
                    <li>
                        <?php
                            if (!isset($_SESSION['customer_email'])) {
                                # code...
                                echo "<a href='checkout.php'> My Account</a>";
                            } else{
                                echo "<a href='customer/my_account.php?my_order'> My Account</a>";
                            }
                        ?>
                    </li>
                    <li>
                        <a href="cart.php"> Goto Cart</a>
                    </li>
                    <li>
                        <?php
                            if (!isset($_SESSION['customer_email'])) {
                                # code...
                                echo "<a href='checkout.php'>Login</a>";
                            }else{
                                echo "<a href='logout.php'>Logout</a>";
                            }
                        ?>
                    </li>
                </ul>
            </div>
        </div><!-- Container End -->
    </div><!-- Top Bar End -->
    <div class="navbar navbar-default" id="navbar"><!-- navbar navbar-default Start -->
        <div class="container">
            <div class="navbar-header"><!-- navbar-header Start -->
                <a class="navbar-brand home" href="index.php">
                    <img src="images/rsz_1rsz_logo-small.png" alt="Batman Logo" class="hidden-xs">
                    <img src="images/rsz_1rsz_logo-small.png" alt="Batman-small Logo" class="visible-xs">
                </a>
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navigation">
                    <span class="sr-only">Toggle Navigation</span> 
                    <i class="fa fa-align-justify"></i>
                </button>
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#search">
                    <span class="sr-only"></span> 
                    <i class="fa fa-search"></i>
                </button>
            </div><!-- navbar-header End -->
            <div class="navbar-collapse collapse" id="navigation"> <!-- navbar-collapse collapse Start -->
                <div class="padding-nav"> <!-- padding-nav Start -->
                    <ul class="nav navbar-nav navbar-left">
                        <li class="active">
                            <a href="index.php">Home</a>
                        </li>
                        <li>
                            <a href="shop.php">Shop</a>
                        </li>
                        <li>
                            <?php
                                if (!isset($_SESSION['customer_email'])) {
                                    # code...
                                    echo "<a href='checkout.php'> My Account</a>";
                                } else{
                                    echo "<a href='customer/my_account.php?my_order'> My Account</a>";
                                }
                            ?>
                        </li>
                        <li>
                            <a href="cart.php">Shopping cart</a>
                        </li>
                        <li>
                            <a href="about.php">About Us</a>
                        </li>
                        <li>
                            <a href="services.php">Services</a>
                        </li>
                        <li>
                            <a href="contactus.php">Contact Us</a>
                        </li>
                    </ul>
                </div><!-- padding-nav End -->
                <a href="cart.php" class="btn btn-primary navbar-btn right">
                    <i class="fa fa-shopping-cart"></i>
                    <span><?php item(); ?> items in cart</span>
                </a>
                <div class="navbar-collapse collapse right"> <!--navbar-collapse collapse right Start -->
                    <button class="btn navbar-btn btn-primary" type="button" data-toggle="collapse" data-target="#search">
                        <span class="sr-only">Toggle Search</span>
                        <i class="fa fa-search"></i>
                    </button>
                </div> <!--navbar-collapse collapse-right End -->
                <div class="collapse clearfix" id="search">
                    <form class="navbar-form" method="get" action="result.php">
                        <div class="input-group">
                            <input type="text" name="user_query" placeholder="Search" class="form-control" required="">
                            <span class="input-group-btn">
                            <button type="submit" value="Search" name="Search" class="btn btn-primary">
                                <i class="fa fa-search"></i>
                            </button>
                            </span>
                        </div>
                    </form>
                </div>
            </div><!-- navbar-collapse collapse End -->
        </div>
    </div><!-- navbar navbar-default End -->
    <div class="container" id="slider"><!-- container Start-->
        <div class="col-md-12"><!-- col-md-12 Start-->
            <div class="carousel slide" id="myCarousel" data-ride="carousel"><!-- carousel slide Start-->
                <ol class="carousel-indicators">
                    <li data-target="myCarousel" data-slide-to="0" class="active"></li>
                    <li data-target="myCarousel" data-slide-to="1"></li>
                    <li data-target="myCarousel" data-slide-to="2"></li>
                    <li data-target="myCarousel" data-slide-to="3"></li>
                </ol>
                <div class="carousel-inner"> <!-- carousel-inner Start-->
                    <?php
                        $get_slider= "select * from slider LIMIT 0,1";
                        $run_slider= mysqli_query($con,$get_slider);
                        while ($row=mysqli_fetch_array($run_slider)) {
                            # code...
                            $slider_name= $row['slider_name'];
                            $slider_image= $row['slider_image'];
                            echo "<div class='item active'>
                            <img src='admin_area/slider_images/$slider_image'>
                            </div> 
                            ";
                        }
                    ?>
                    <?php
                        $get_slider="select * from slider LIMIT 1,3";
                        $run_slider=mysqli_query($con,$get_slider);
                        while ($row=mysqli_fetch_array($run_slider)) {
                            # code...
                            $slider_name=$row['slider_name'];
                            $slider_image=$row['slider_image'];
                            echo "
                            <div class='item'>
                            <img src='admin_area/slider_images/$slider_image'>
                            </div>
                            ";
                        }
                    ?>
                </div><!-- carousel-inner End-->
                <a href="#myCarousel" class="left carousel-control" data-slide="prev">
                    <span class="glyphicon glyphicon-chevron-left"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a href="#myCarousel" class="right carousel-control" data-slide="next">
                    <span class="glyphicon glyphicon-chevron-right"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div><!-- carousel slide End-->
        </div><!-- col-md-12 End-->
    </div><!-- container Start-->

    <div id="advantage"><!-- advantage Start-->
        <div class="container"><!-- container Start-->
            <div class="same-height-row"><!-- same-height-row Start-->
                <div class="col-sm-4"><!-- col-sm-4 Start-->
                    <div class="box same-height">
                        <div class="icon">
                            <i class="fa fa-heart"></i>
                        </div>
                        <h3><a href="#">BEST PRICES</a></h3>
                            <p>We offer the best prices over the market</p>
                    </div>
                </div><!-- col-sm-4 End-->
                <div class="col-sm-4"><!-- col-sm-4 Start-->
                    <div class="box same-height">
                        <div class="icon">
                            <i class="fa fa-heart"></i>
                        </div>
                        <h3><a href="#">Free Shipping only for you</a></h3>
                            <p>Fastest snipping 100% gurantee</p>
                    </div>
                </div><!-- col-sm-4 End-->
                <div class="col-sm-4"><!-- col-sm-4 Start-->
                    <div class="box same-height">
                        <div class="icon">
                            <i class="fa fa-heart"></i>
                        </div>
                        <h3><a href="#">Cashback</a></h3>
                            <p>Get up to ₹500 additional cashback</p>
                    </div>
                </div><!-- col-sm-4 End-->
            </div><!-- same-height-row End-->
        </div><!-- container End-->
    </div><!-- advantage End-->

    <div id="hot"><!-- Hot start-->
        <div class="box">
            <div class="container">
                <div class="col-md-12">
                    <h2>Latest this week</h2>
                </div>
            </div>
        </div>
    </div><!-- Hot End-->
    <div id="content" class="container">
        <div class="row">
            <?php
                getPro();
            ?>
        </div>
    </div>
<!--Footer Start-->
<?php
    include("includes/footer.php")
?>
    <!--Footer End-->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</body>
</html>


