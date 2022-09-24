<?php 

require('connection.inc.php');
require('add_to_cart.php');
require('functions.inc.php');

// value fetch
$pid = get_safe_value($con, $_POST['pid']);
$qty = get_safe_value($con, $_POST['qty']);  
$type = get_safe_value($con, $_POST['type']);  

//create a object of add_to_cart
$obj = new add_to_cart();

if($type == 'add') // condition 1
{
    $obj->addproduct($pid,$qty); // addtoproduct function call using obj 
}

if($type == 'remove') // condition 2 for remove product from cart
{
    $obj->removeproduct($pid); 
}

if($type == 'update') // condition 3 for update product from cart
{
    $obj->updateproduct($pid,$qty); 
}

echo $obj->totalproduct(); // print the func totalproduct


?>