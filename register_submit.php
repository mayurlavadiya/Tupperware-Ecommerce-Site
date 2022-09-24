<?php 

require('connection.inc.php');
require('functions.inc.php');

$name = get_safe_value($con, $_POST['name']);
$email = get_safe_value($con, $_POST['email']);
$mobile = get_safe_value($con, $_POST['mobile']);
$password = get_safe_value($con, $_POST['password']);

// check if email id is already registered or not

$check_user = mysqli_num_rows(mysqli_query($con,"SELECT * FROM usermaster WHERE email='$email'"));

if($check_user>0){
    echo "present";
}else
{ 
    $added_on=date('Y-m-d h:i:s');
    mysqli_query ($con, "INSERT INTO usermaster (`name`,`email`,`mobile`,`password`,`added_on`) values 
    ('$name','$email','$mobile','$password','$added_on')");
    echo "insert";
}

?>