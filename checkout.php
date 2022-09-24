<?php
    require('top.php');
    if(!isset($_SESSION['cart']) || count($_SESSION['cart']) == 0) 
    {
    ?>
    <script>
    window.location.href = 'index.php';
    </script>
<?php    
}    

$cart_total=0;

if(isset($_POST['submit']))
{
    $address = get_safe_value($con,$_POST['address']) ;
    $city = get_safe_value($con,$_POST['city']) ;
    $pincode = get_safe_value($con,$_POST['pincode']) ;
    $payment_type = get_safe_value($con,$_POST['payment_type']) ;    
    $user_id = $_SESSION['USER_ID']; // fetch from session - user  id fetch
    
    foreach($_SESSION['cart'] as $key=>$val)
    {    
        $productArr=get_product($con,'','',$key);    
        $price = $productArr[0]['price'];
        $qty = $val['qty'];
        $cart_total = $cart_total+($price*$qty);
    }
    $total_price = $cart_total;
    $payment_status = 'Pending';

    if($payment_type == 'cod')
    {
    $payment_status = 'success';

    $order_status = '1';
    $added_on = date('Y-m-d h:i:s');
    
    // data insert into "order table" 

    mysqli_query($con, "INSERT INTO `order` (user_id, address, city, pincode, payment_type, total_price, payment_status, order_status, added_on) 
    VALUES ('$user_id', '$address', '$city', '$pincode', '$payment_type', '$total_price', '$payment_status', '$order_status', '$added_on')");

    // data insert into "order detail table" from above queries and their data

    $order_id = mysqli_insert_id($con);

    foreach($_SESSION['cart'] as $key=>$val)
    {    
        $productArr=get_product($con,'','',$key);    
        $price = $productArr[0]['price'];
        $qty = $val['qty'];
    
    mysqli_query($con, "INSERT INTO `order_detail` (order_id, product_id, qty, price) 
    VALUES ('$order_id',  '$key', '$qty', '$price')");  
    }

    unset($_SESSION['cart']);
    ?>
    <script>
    window.location.href = 'Thankyou.php';
    </script>
    <?php    
}

}    
?>

<div class="ht__bradcaump__area"
    style="background: rgba(0, 0, 0, 0) url(images/bg/checkout.png) no-repeat scroll center left/ cover ;background-size :60%">
    <div class="ht__bradcaump__wrap">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <div class="bradcaump__inner">
                        <nav class="bradcaump-inner">
                            <a class="breadcrumb-item" href="index.php">Home</a>
                            <span class="brd-separetor"><i class="zmdi zmdi-chevron-right"></i></span>
                            <span class="breadcrumb-item active">checkout</span>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Bradcaump area -->
<!-- cart-main-area start -->
<div class="checkout-wrap ptb--100">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="checkout__inner">
                    <div class="accordion-list">
                        <div class="accordion">
                            <?php 
                        $accordion_class = 'accordion__title';
                        if(!isset($_SESSION['USER_LOGIN']))
                        {
                        $accordion_class = 'accordion__hide';
                    ?>
                            <div class="accordion__title">
                                Checkout Method
                            </div>
                            <div class="accordion__body">
                                <div class="accordion__body__form">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="checkout-method__login">
                                                <form id="login-form" method="post">
                                                    <h5 class="checkout-method__title">Login</h5>
                                                    <div class="single-input">
                                                        <input type="text" name="login_email" id="login_email"
                                                            placeholder="Your Email*" style="width:100%">
                                                        <span class="field_error" id="login_email_error"></span>
                                                    </div>
                                                    <div class="single-input">
                                                        <input type="password" name="login_password" id="login_password"
                                                            placeholder="Your Password*" style="width:100%">
                                                        <span class="field_error" id="login_password_error"></span>
                                                    </div>
                                                    <div class="dark-btn">
                                                        <button type="button" class="fv-btn"
                                                            onclick="user_login()">Login</button>
                                                    </div>
                                                    <div class="form-output login_msg">
                                                        <p class="form-messege field_error"></p>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="checkout-method__login">
                                                <form action="#">
                                                    <h5 class="checkout-method__title">Register</h5>
                                                    <div class="single-input">
                                                        <input type="text" name="name" id="name"
                                                            placeholder="Your Name*" style="width:100%">
                                                        <span class="field_error" id="name_error"></span>
                                                    </div>

                                                    <div class="single-input">
                                                        <input type="text" name="email" id="email"
                                                            placeholder="Your Email*" style="width:100%">
                                                        <span class="field_error" id="email_error"></span>
                                                    </div>

                                                    <div class="single-input">
                                                        <input type="text" name="mobile" maxlength="10" id="mobile"
                                                            placeholder="Your Mobile*" style="width:100%">
                                                        <span class="field_error" id="mobile_error"></span>
                                                    </div>

                                                    <div class="single-input">
                                                        <input type="password" name="password" id="password"
                                                            placeholder="Your Password*" style="width:100%">
                                                        <span class="field_error" id="password_error"></span>
                                                    </div>

                                                    <div class="contact-btn">
                                                        <button type="button" class="fv-btn"
                                                            onclick="user_register()">Register</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php } ?>
                            <div class="accordion__title">
                                Address Information
                            </div>
                            <form method="post">
                                <div class="accordion__body">
                                    <div class="bilinfo">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="single-input">
                                                    <input type="text" name="address" placeholder="Street Address"
                                                        required>
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="single-input">
                                                    <input type="text" name="city" placeholder="City / State" required>
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="single-input">
                                                    <input type="text" name="pincode" placeholder="Post code / zip"
                                                        required>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="accordion__title">
                                    payment information
                                </div>
                                <div class="accordion__body">
                                    <div class="paymentinfo">
                                        <div class="single-method">
                                            <h2><b> COD <input type="radio" name="payment_type" value="cod" required /></b></h2><br>
                                        </div>
                                        
                                        <div class="single-method">
                                        <form><script src="https://checkout.razorpay.com/v1/payment-button.js" data-payment_button_id="pl_KGXytgFnYLb4GP" async> </script> </form>
                                        </div>
                                    </div>
                                </div>
                                <div class="contact-btn">
                                    <input type="submit" name="submit" class="fv-btn" />
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="order-details">
                    <h5 class="order-details__title">Your Order</h5>
                    <div class="order-details__item">
                        <?php
                    // $cart_total=0;
                    foreach($_SESSION['cart'] as $key=>$val)
                    {        
                    $productArr=get_product($con,'','',$key);
                    $pname = $productArr[0]['name'];
                    $mrp = $productArr[0]['mrp'];
                    $price = $productArr[0]['price'];
                    $image = $productArr[0]['image'];
                    $qty = $val['qty'];
                    $cart_total = $cart_total+($price*$qty);
                ?>
                        <div class="single-item">
                            <div class="single-item__thumb">
                                <img src="<?php echo PRODUCT_IMAGE_SITE_PATH.$image ?>" alt="ordered item">
                            </div>
                            <div class="single-item__content">
                                <a href="#"><?php echo $pname ?></a>
                                <span class="price"><?php echo 'Rs. '.$price*$qty.' /-' ?></span>
                            </div>
                            <div class="single-item__remove">
                                <a href="javascript:void(0)" onclick="manage_cart('<?php echo $key ?>','remove')">
                                    <i class="icon-trash icons"></i></a>
                            </div>
                        </div>
                        <?php } ?>
                    </div>

                    <div class="ordre-details__total">
                        <h5>Order total</h5>
                        <span class="price"><?php echo 'Rs.'.$cart_total.'/-' ?></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- cart-main-area end -->


<?php require('footer.php') ?>