<?php
session_start();
$con=mysqli_connect("admin1.cemykxml9xwk.us-west-2.rds.amazonaws.com","ecom123","ecom$1234","ecomm");
// $con=mysqli_connect("localhost","root","","ecom");
define('SERVER_PATH',$_SERVER['DOCUMENT_ROOT'].'/Electronix-Website/ecom/');
define('SITE_PATH','http://127.0.0.1/Electronix-Website/ecom/');

define('PRODUCT_IMAGE_SERVER_PATH',SERVER_PATH.'media/product/');
define('PRODUCT_IMAGE_SITE_PATH',SITE_PATH.'media/product/');
?>