<?php 
    require('top.php');
    error_reporting(0);
    extract($_POST);

    $cat_id=mysqli_real_escape_string($con,$_GET['id']);
    // prx($get_product); // for value print in arrat format for just checking

    if($cat_id>0){  
        $get_product=get_product($con,'',$cat_id);
    }else{
?>
    <script>
    window.location.href = 'index.php';
    </script>
    <?php   
    }
    ?>

<br>
<br>
<br>
<br>

<div class="body__overlay"></div>
<!-- Start Bradcaump area -->
<div class="ht__bradcaump__area">
    <div class="ht__bradcaump__wrap">
    <div class="container">
        <div class="row align-items__center">
        <div class="col-lg-6 col-sm-5 col-xs-12 col-md-5">
                
                <a href =""><img src="images/shop.png" width=100% alt="slider images"></a>
            </div>
        </div>
    </div>
    </div>
</div>
<!-- End Bradcaump area -->
<!-- Start Product Grid -->
<section class="htc__product__grid bg__white ptb--100">
    <div class="container">
        <div class="row">
            <?php if(count($get_product)>0){?>

            <div class="col-lg-12 col-md-12 col-xs-12">
                <div class="htc__product__rightidebar">
                    
                    <!-- Start Product View -->
                    <div class="row">
                        <div class="shop__grid__view__wrap">
                            <div role="tabpanel" id="grid-view"
                                class="single-grid-view tab-pane fade in active clearfix">
                            <?php
                                foreach($get_product as $list){
                            ?> 
                            <!-- Start Single Category -->
                            <div class="col-md-4">

                                <div class="category">
                                    <div class="ht__cat__thumb">
                                        <a href="product.php?id=<?php echo $list['id'] ?>">
                                            <img width='100vw' height='350px' src="<?php echo PRODUCT_IMAGE_SITE_PATH.$list['image'] ?>" alt="product images">
                                        </a>
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
            </div>
            <?php } else {
						echo "Data Not Found";
					}?>

        </div>
    </div>
    </div>
</section>
<!-- End Product Grid -->

<?php require('footer.php') ?>