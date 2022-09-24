<?php 
require('connection.inc.php');
require('functions.inc.php');
require('add_to_cart.php');


$cat_resource=mysqli_query($con,"Select * from categories where status=1 order by categories asc");
$cat_arr=array();

while($row=mysqli_fetch_assoc($cat_resource)){
   $cat_arr[]=$row;
}

$obj = new add_to_cart();
$totalproduct = $obj->totalproduct();
?> 

<!doctype html>
<html class="no-js" lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>TUPPERWARE - RAJKOT</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">    
    <link rel="shortcut icon" type="image/x-icon" href="images/favicon_io/favicon.ico">
    <link rel="apple-touch-icon" href="apple-touch-icon.png">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    <link rel="stylesheet" href="css/core.css">
    <link rel="stylesheet" href="css/shortcode/shortcodes.css">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="css/responsive.css">
    <link rel="stylesheet" href="css/custom.css">
    <link rel="canonical" href="https://getbootstrap.com/docs/5.2/examples/carousel/">
    <link rel="stylesheet" href="css/shortcode/slider.css">
</head>

<body>
    <div class="wrapper">
        <!-- Start Header Style -->
        <header id="htc__header" class="htc__header__area header--one ">
            <!-- Start Mainmenu Area -->
            <div id="sticky-header-with-topbar" class="mainmenu__wrap sticky__header">
                <div class="container">
                    <div class="row">
                        <div class="menumenu__container clearfix">
                            <div class="col-lg-2 col-md-2 col-sm-3 col-xs-5"> 
                                <div class="logo">
                                     <a href="index.php"><img src="admin/images/logo3.png" alt="logo images"></a>
                                </div>
                            </div>
                            <div class="col-md-7 col-lg-8 col-sm-5 col-xs-3">
                                <nav class="main__menu__nav hidden-xs hidden-sm">
                                    <ul class="main__menu">
                                        <li class="drop"><a href="index.php">Home</a></li>
                                        <li class="drop"><a href="aboutus.php">About Us</a>
                                            <ul class="dropdown">                                                
                                            <li><a href="beginning.php">The Beginning</a></li>
                                            <li><a href="awards.php">Awards & Accolades</a></li>
                                            <li><a href="replacement.php">Replacement Policy</a></li>

                                            </ul>
                                            </li>
                                        <li class="drop"><a href="#">categories</a>
                                            <ul class="dropdown">
                                             <?php
                                                foreach($cat_arr as $list){
                                                ?>
                                                <li><a href="categories.php?id=<?php echo $list['id']?>"><?php echo $list['categories']?></a></li>
                                                <?php
                                                }
                                             ?>
                                             </ul>
                                        </li>
                                        <li><a href="contact.php">contact</a></li>
                                        <li><a href="#"></a></li>


                                    </ul>
                                </nav>

                                <div class="mobile-menu clearfix visible-xs visible-sm">
                                    <nav id="mobile_dropdown">
                                        <ul>
                                            <li><a href="index.php">Home</a></li>
                                            <li class="drop"><a href="aboutus.php">About Us</a>
                                            <ul class="dropdown">                                                
                                            <li><a href="contact.php">contact</a></li>

                                            </ul>
                                            </li>
                                            <li class="drop"><a href="#">categories</a>
                                                <ul class="dropdown">
                                                <?php
                                                    foreach($cat_arr as $list){
                                                    ?>
                                                    <li><a href="categories.php?id=<?php echo $list['id']?>"><?php echo $list['categories']?></a></li>
                                                    <?php
                                                    }
                                                ?>
                                                </ul>
                                            </li>
                                            <li><a href="contact.php">contact</a></li>
                                        </ul>
                                        
                                    </nav>
                                </div>  
                            </div>
                            <div class="col-md-3 col-lg-2 col-sm-4 col-xs-4">
                                <div class="header__right">
                                <div class="header__account">
										<?php if(isset($_SESSION['USER_LOGIN'])){
											?>
											<nav class="navbar navbar-expand-lg navbar-light bg-light">
											   <button class="navbar-toggler" type="button" data-toggle="collapse" 
                                               data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" 
                                               aria-expanded="false">
												<!-- <span class="navbar-toggler-icon"></span> -->
											  </button>

											  <div class="collapse navbar-collapse" id="navbarSupportedContent">
												<ul class="navbar-nav mr-auto">
												  <li class="nav-item dropdown">
													<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" 
                                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
													<?php echo $_SESSION['USER_NAME']?>
													</a>
													<div class="dropdown-menu" aria-labelledby="navbarDropdown">
													  <a class="dropdown-item" href="myorder.php">Order</a><br>
													  <a class="dropdown-item" href="profile.php">Profile</a><br>
													  <a class="dropdown-item" href="ordertracking.php">Track Order</a><br>
													  <!-- <div class="dropdown-divider"></div> -->
													  <a class="dropdown-item" href="logout.php">Logout</a>
													</div>
												  </li>
												</ul>
											  </div>
											</nav>
											<?php
										}else{
											 echo '<a href="login.php" class="mr15"><img src="images/user.png" width="130px"> Login/Register</a>';
										}
										?>
										
                                    </div>            
                                    <div class="htc__shopping__cart">
                                        <a class="cart__menu" href="cart.php"><i class="icon-handbag icons"></i></a>
                                        <a href="cart.php"><span class="htc__qua" style="display:<?php echo $totalproduct > 0 ? 'inline-block' : 'none' ?>"><?php echo $totalproduct ?></span></a>
                                                                             
                                         
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="mobile-menu-area"></div>
                </div>
            </div>
            <!-- End Mainmenu Area -->
        </header>
        <!-- End Header Area -->