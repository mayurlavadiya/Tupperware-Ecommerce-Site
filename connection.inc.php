<?php
	session_start();
	$con=mysqli_connect("localhost","root","","users");

	define('SERVER_PATH',$_SERVER['DOCUMENT_ROOT'].'/Synergy/');
	define('SITE_PATH','http://localhost:8080/Synergy/');

	define('PRODUCT_IMAGE_SERVER_PATH',SERVER_PATH.'media/product/');
	define('PRODUCT_IMAGE_SITE_PATH',SITE_PATH.'media/product/');


?>