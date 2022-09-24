<?php require('top.php'); ?>

<?php 
$cart_total=0;

if(isset($_POST['submit']))
{

    $card_no = get_safe_value($con,$_POST['card_no']) ;
    $card_name = get_safe_value($con,$_POST['card_name']) ;

    $user_id = $_SESSION['USER_ID']; // fetch from session - user  id fetch
    
    if($payment_type == 'payonline')
    {
    $payment_status = 'success';

    $order_status = '1';
    

    mysqli_query($con, "INSERT INTO `order` (user_id, address, city, pincode, payment_type, total_price, payment_status, order_status,
    card_no, card_name, added_on) 
    VALUES ('$user_id', '$address', '$city', '$pincode', '$payment_type', '$total_price', '$payment_status', '$order_status',
    '$card_no', '$card_name', '$added_on')");


    }
    
    unset($_SESSION['cart']);
    ?>
    <script>
    window.location.href = 'Thankyou.php';
    </script>
<?php    
}    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!-- custom css file link  -->
    <link rel="stylesheet" href="payu/css/style.css">

</head>

<body>
<br/>
<div class="container">

    <div class="card-container">

        <div class="front">
            <div class="image">
                <img src="payu/image/chip.png" alt="">
                <img src="payu/image/visa.png" alt="">
            </div>
            
            <div class="card-number-box">#### #### #### ####</div>
            <div class="flexbox">
                <div class="box">
                    <span>Card Holder</span>
                    <div class="card-holder-name">Full Name</div>
                </div>
                <div class="box">
                    <span>Valid Thru</span>
                    <div class="expiration">
                        <span class="exp-month">MM</span>
                        <span class="exp-year">YY</span>
                    </div>
                </div>
            </div>
        </div>

        <div class="back">
            <div class="stripe"></div>
            <div class="box">
                <span>CVV</span>
                <div class="cvv-box"></div>
                <img src="image/visa.png" alt="">
            </div>
        </div>

    </div>
   

    <form id="contact-form" method="post" action="">
        <div class="inputBox">
            <span>Card Number</span>
            <input type="text" id="card_no" maxlength="16" class="card-number-input" required>
        </div>
        <div class="inputBox">
            <span>Card Holder Name</span>
            <input type="text" id="card_name" class="card-holder-input" required>
        </div>
        <div class="flexbox">
            <div class="inputBox">
                <span>Valid Thru MM</span>
                <select name="" id="" class="month-input" required>
                    <option value="month" selected disabled>Month</option>
                    <option value="01">01</option>
                    <option value="02">02</option>
                    <option value="03">03</option>
                    <option value="04">04</option>
                    <option value="05">05</option>  
                    <option value="06">06</option>
                    <option value="07">07</option>
                    <option value="08">08</option>
                    <option value="09">09</option>
                    <option value="10">10</option>
                    <option value="11">11</option>
                    <option value="12">12</option>
                </select>
            </div>
            <div class="inputBox">
                <span>Valid Thru YY </span>
                <select name="" id="" class="year-input" required>
                    <option value="year" selected disabled>Year</option>
                    <option value="2021">2021</option>
                    <option value="2022">2022</option>
                    <option value="2023">2023</option>
                    <option value="2024">2024</option>
                    <option value="2025">2025</option>
                    <option value="2026">2026</option>
                    <option value="2027">2027</option>
                    <option value="2028">2028</option>
                    <option value="2029">2029</option>
                    <option value="2030">2030</option>
                </select>
            </div>
            <div class="inputBox">
                <span>CVV</span>
                <input type="text" maxlength="3" class="cvv-input" required>
            </div>
        </div>
        <input type="submit" value="submit" class="submit-btn">
    </form>
    <br/>
    <br/>

</div>    
    





<script>

document.querySelector('.card-number-input').oninput = () =>{
    document.querySelector('.card-number-box').innerText = document.querySelector('.card-number-input').value;
}

document.querySelector('.card-holder-input').oninput = () =>{
    document.querySelector('.card-holder-name').innerText = document.querySelector('.card-holder-input').value;
}

document.querySelector('.month-input').oninput = () =>{
    document.querySelector('.exp-month').innerText = document.querySelector('.month-input').value;
}

document.querySelector('.year-input').oninput = () =>{
    document.querySelector('.exp-year').innerText = document.querySelector('.year-input').value;
}

document.querySelector('.cvv-input').onmouseenter = () =>{
    document.querySelector('.front').style.transform = 'perspective(1000px) rotateY(-180deg)';
    document.querySelector('.back').style.transform = 'perspective(1000px) rotateY(0deg)';
}

document.querySelector('.cvv-input').onmouseleave = () =>{
    document.querySelector('.front').style.transform = 'perspective(1000px) rotateY(0deg)';
    document.querySelector('.back').style.transform = 'perspective(1000px) rotateY(180deg)';
}

document.querySelector('.cvv-input').oninput = () =>{
    document.querySelector('.cvv-box').innerText = document.querySelector('.cvv-input').value;
}

</script>

</body>
</html>




<?php require('footer.php') ?>
