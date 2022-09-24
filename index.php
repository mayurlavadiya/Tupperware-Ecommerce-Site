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


    <style>

* {box-sizing: border-box;}
body {font-family: Verdana, sans-serif;}
.mySlides {display: none;}
img {vertical-align: middle;}

/* Slideshow container */
.slideshow-container {
  max-width: 1000px;
  position: relative;
  margin: auto;
  margin-top: 80px;
  margin-bottom: 80px;
}

/* Caption text */
.text {
  color: #f2f2f2;
  font-size: 15px;
  padding: 8px 12px;
  position: absolute;
  bottom: 8px;
  width: 100%;
  text-align: center;
}

/* Number text (1/3 etc) */
.numbertext {
  color: #f2f2f2;
  font-size: 12px;
  padding: 8px 12px;
  position: absolute;
  top: 0;
}

/* The dots/bullets/indicators */
.dot {
  height: 15px;
  width: 15px;
  margin: 0 2px;
  background-color: #bbb;
  border-radius: 50%;
  display: inline-block;
  transition: background-color 0.6s ease;
}

.active {
  background-color: #717171;
}

/* Fading animation */
.fade {
  animation-name: fade;
  animation-duration: 3s;
}

@keyframes fade {
  from {opacity: 1} 
  to {opacity: 1}
}

/* On smaller screens, decrease text size */
@media only screen and (max-width: 300px) {
  .text {font-size: 11px}
}

</style>

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
        <div class="slideshow-container">
    <div class="mySlides fade">
      <div class="numbertext"></div>
      <img src="images/slider/2.png" > 
    </div>

    <div class="mySlides fade">
      <div class="numbertext"></div>
      <img src="images/slider/4.png" style="width:100%">  
    </div>

    <div class="mySlides fade">
      <div class="numbertext"></div>
      <img src="images/slider/9.png" style="width:100%">  
    </div>

</div>

<div style="text-align:center">
  <span class="dot"></span> 
  <span class="dot"></span> 
  <span class="dot"></span> 
</div>

<div class="body__overlay"></div>
        
        <!-- Start Category Area -->
        <section class="htc__category__area ptb--100">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12">
                        <div class="section__title--2 text-center">
                            <h2 class="title__line">New Arrivals</h2>
                            
                        </div>
                    </div>
                </div>
                <div class="htc__product__container">
                    <div class="row">
                        <div class="product__list clearfix mt--30">
                            <?php
                            $get_product = get_product($con,4);
                            foreach($get_product as $list){
                            ?>
                            <!-- Start Single Category -->
                            <div class="col-md-4 col-lg-3 col-sm-4 col-xs-12">
                                <div class="category">
                                    <div class="ht__cat__thumb">
                                        <a href="product.php?id=<?php echo $list['id'] ?>">
                                            <img width='100vw' height='270' src="<?php echo PRODUCT_IMAGE_SITE_PATH.$list['image'] ?>" alt="product images">
                                        </a>
                                    </div>
                                    <div class="fr__hover__info">
                                        <ul class="product__action">
                                            <li><a href="wishlist.php"><i class="icon-heart icons"></i></a></li>
                                            <li><a href="cart.php"><i class="icon-handbag icons"></i></a></li>
                                        </ul>
                                    </div>
                                    <div class="fr__product__inner">
                                        <h4><a href="product.php?id=<?php echo $list['id'] ?>"><?php echo $list['name'] ?></a></h4>
                                        <ul class="fr__pro__prize">
                                            <li class="old__prize"><?php echo 'Rs.'.$list['mrp'] ?></li>
                                            <li><?php echo 'Rs.'.$list['price'] ?></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <!-- End Single Category -->
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End Category Area -->
        <!-- Start Product Area -->
        <section class="ftr__product__area ptb--100">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12">
                        <div class="section__title--2 text-center">
                            <h2 class="title__line">Best Seller</h2>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="product__wrap clearfix">
                        <!-- Start Single Category -->
                        <div class="col-md-4 col-lg-3 col-sm-4 col-xs-12">
                            <div class="category">
                                <div class="ht__cat__thumb">
                                    <a href="product.php?id=100">
                                        <img src="images/product/chopper.jpg" height=270px alt="product images">
                                    </a>
                                </div>
                                <div class="fr__product__inner">
                                    <h4><a href="product.php?id=100">GEN II TURBO CHOPPER</a></h4>
                                    <ul class="fr__pro__prize">
                                        <li class="old__prize">Rs. 2090 </li>
                                        <li>Rs. 2090 </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        

                        <div class="col-md-4 col-lg-3 col-sm-4 col-xs-12">
                            <div class="category">
                                <div class="ht__cat__thumb">
                                    <a href="product.php?id=107">
                                        <img src="images/product/spice.jpg" height=270px alt="product images">
                                    </a>
                                </div>
                                <div class="fr__product__inner">
                                    <h4><a href="product.php?id=107">Spice It</a></h4>
                                    <ul class="fr__pro__prize">
                                        <li class="old__prize">Rs. 1040</li>
                                        <li>Rs. 1040</li>
                                    </ul>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4 col-lg-3 col-sm-4 col-xs-12">
                            <div class="category">
                                <div class="ht__cat__thumb">
                                    <a href="product.php?id=96">
                                        <img src="images/product/elegant.jpg" height=270px alt="product images">
                                    </a>
                                </div>
                                <div class="fr__product__inner">
                                    <h4><a href="product.php?id=96">Elegant Lunch Set</a></h4>
                                    <ul class="fr__pro__prize">
                                        <li class="old__prize">Rs. 1280</li>
                                        <li>Rs. 1280</li>
                                    </ul>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4 col-lg-3 col-sm-4 col-xs-12">
                            <div class="category">
                                <div class="ht__cat__thumb">
                                    <a href="product.php?id=109">
                                        <img src="images/product/otc.jpg" height=270px alt="product images">
                                    </a>
                                </div>
                                <div class="fr__product__inner">
                                    <h4><a href="product.php?id=109">OTC 2 LTR(JB)</a></h4>
                                    <ul class="fr__pro__prize">
                                        <li class="old__prize">Rs. 1200</li>
                                        <li>Rs. 1200</li>
                                    </ul>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </section>
        <!-- End Product Area -->
<script>
let slideIndex = 0;
showSlides();

function showSlides() {
  let i;
  let slides = document.getElementsByClassName("mySlides");
  let dots = document.getElementsByClassName("dot");
  for (i = 0; i < slides.length; i++) {
    slides[i].style.display = "none";  
  }
  slideIndex++;
  if (slideIndex > slides.length) {slideIndex = 1}    
  for (i = 0; i < dots.length; i++) {
    dots[i].className = dots[i].className.replace(" active", "");
  }
  slides[slideIndex-1].style.display = "block";  
  dots[slideIndex-1].className += " active";
  setTimeout(showSlides, 3000); // Change image every 2 seconds
}
</script>
<?php require('footer.php');?>
