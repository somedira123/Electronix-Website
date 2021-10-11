<?php
session_start();
if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!= true){
  header("location: sign in.php");
  exit;
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="/Electronix-Website/CSS/payment.css">
</head>

<style>

  *{
    font-size: 20px;
  }
  .button{
    font-size: 20px;
    color: white;
    background-color: darkblue;
    border-radius: 20px ;
    width: 23%;
    margin: 10px;
  }
  font-size: 20px
  {
    color:black;
  }
  body{
    background-color: #A1D8F7;
  }
  * {
  box-sizing: border-box;
}

body {
  margin: 0;
  padding: 0;
  font-family: Arial, Helvetica, sans-serif;
  background-color: #A1D8F7;
}

header {
  background: rgb(0, 0, 0);
  display: flex;
  color: rgb(255, 255, 255);
  justify-content: space-around;
  align-items: center;
}

.main_header a {
  float: right;
  display: block;
  color: rgb(255, 255, 255);
  text-align: center;
  padding: 14px 12px;
  text-decoration: none;
  font-size: 17px;
}

.main_header .search-container {
  float: right;
}

.main_header input[type=text] {
  padding: 6px;
  width: 500px;
  font-size: 17px;
  border: none;
}

.main_header .search-container button {
  float: right;
  padding: 6px 10px;
  margin-right: 16px;
  background: #ccc;
  font-size: 17px;
  border: none;
  cursor: pointer;
}

.main_header .search-container button:hover {
  background: rgb(160, 159, 159);
}

.main_header .logo:hover {
  cursor: pointer;
}

.logo {
  margin-top: 4px;
}

.signup i {
  margin-top: 15px;
}

.signup-box {
  padding: 0 15px 0 15px;
}

.signup-box:hover {
  background-color: rgb(126, 127, 133);
  cursor: pointer;
}

.cart i {
  margin-top: 15px;
}

.cart-box {
  padding: 0 15px 0 15px;
}

.cart-box:hover {
  background-color: rgb(126, 127, 133);
  cursor: pointer;
}

.dropbtn {
  background: rgb(0, 0, 0);
  color: white;
  padding: 16px;
  font-size: 16px;
  border: none;
  cursor: pointer;
}

.dropdown {
  position: relative;
  display: inline-block;
}

.dropdown-content {
  display: none;
  position: absolute;
  background-color: #f9f9f9;
  min-width: 150px;
  box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
  z-index: 1;
}
.dropdown-content a {
  color: black;
  padding: 12px 50px;
  text-decoration: none;
}
.dropdown-content a:hover {
  color: rgb(126, 127, 133);
}
.dropdown:hover .dropdown-content {
  display: block;
}
.dropdown:hover .dropbtn {
  background-color: rgb(126, 127, 133);
}

.heading{
  text-align: center;
  font-size: 35px;
  color: black;
}
.box-container{
  display: grid;
  grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
  grid-gap: 15px;
  padding: 20px;
}
.box-container a{
  text-decoration: none;
  color: black;
}

.box-container .box{
  padding: 10px;
  border-radius: 10px;
  background-color: #fff;
  border: 2px solid black;
  text-align: center;
}
.box-container .box:hover{
  cursor: pointer;
  background-color: rgb(232, 246, 248);
}
.box-container .box .icon span{
  margin: 20px 0 0 0;
  font-size: 35px;
  color: rgb(31, 148, 202);
}
.box-container .box title{
  color:rgb(0, 0, 0);
  font-size: 20px;
}


.products h1{
  text-align: center;
  font-size: 3rem;
  color: black;
}
.products .box_container{
  display: flex;
  flex-wrap: wrap;
  gap: 1.5rem;
}
.products .box_container .box{
  border: 2px solid black;
  border-radius: 10px;
  text-align: center;
  position: relative;
  overflow: hidden;
  background: #f9f9f9;
  flex: 1 1 15rem;
}
.products .box_container .box .content .btn{
  text-decoration: none;
  background-color: darkblue;
  color: white;
  border: 2px solid black;
  margin: .5rem;
  padding: .5rem;
  border-radius: 10px;
}

.products .box_container .box .content .btn:hover{
  background-color: lightblue;
  color:black;
}
.products .box_container .box .content{
  padding: 30px;
  margin: 5px 0 0 0;
}
.products .box_container .box img{
  height: 10rem;
  margin-top: 10px;
  border: 2px solid black;
}
.products .box_container .box .content p{
  color: black;
  font-size: 25px;
  font-weight: bolder;
  padding: 0;
  margin: 0;
}
.products .box_container .box .content h4{
  color: black;
  font-size: 25px;
}
.products .box_container .box:hover img{
  cursor: pointer;
}

.products .box_container .box .content h3{
  color: black;
  font-size: 35px;
  margin: 0;
}
.products .box_container .box .content .price{
  color: black;
  font-size: 30px;
  font-weight: bolder;
  padding: 1rem 0;
}
.products .box_container .box .content span{
  color: rgb(126, 126, 126);
  font-size: 1.5rem;
text-decoration: line-through;
}

.products .box_container .box .content .stars{
  padding-bottom: 1rem;
}

.products .box_container .box .content .stars i{
  font-size: 1.5rem;
  color: orange;
}

footer {
  background-color: black;
  color: white;
  padding: 20px 20px;
  text-align: center;
}
  </style>
  <body>
  <header class="main_header">
        <div class="logo">
            <a href=""><b>ELECTRONIX</b></a>
            <img src="/Electronix-Website/Images/logo.jpg" alt="" height="45px" width="50px">
        </div>
        <div class="search-container">
            <form action="/action_page.php">
                <input type="text" placeholder="Search for products, brands and much more..." name="search">
                <button type="submit"><i class="fa fa-search"></i></button>
            </form>
        </div>
        <div class="dropdown">
            <button class="dropbtn">
                <i class="fa fa-caret-down" aria-hidden="true"></i> MORE
            </button>
            <div class="dropdown-content">
                <a href="#">My Order</a>
                <a href="/Electronix-Website/PHP/settings.php">My Account</a>
                <a href="#">Contact Us</a>
                <a href="#">About Us</a>
                <a href="#">Services</a>
            </div>
        </div>
        <div class="signup-box">
            <div class="signup">
                <a href="/Electronix-Website/PHP/sign up.php">SIGNUP</a>
                <i class="fa fa-user"></i>
            </div>
        </div>
        <div class="cart-box">
            <div class="cart">
                <a href="/Electronix-Website/HTML/cart.html">CART</a>
                <i class="fa fa-shopping-cart"></i>
            </div>
        </div>
    </header>
    <h1 style="color: black;">Payment Policy</h1>

    <label for="Payment" style="color: black;">Select your Payment Options</label>
      <div>
      <select name="mobile Number" id="Mobile number">
      <option value="cod" class="click">Cash on delivery</option>
      <option value="pt" class="click">PAYTM</option>
      <option value="cd" class="click">Credit Card</option>
      <option value="dd" class="click">Debit Card</option>
      </select>
  </div><br>


   <a href="/Electronix-Website/PHP/card.php">
     <input type="button" class="button" value="Add your cards"></a><br>

   <img src="/Website/Images/cards.jfif" alt="" srcset=""><br><br>
   <a href="/Electronix-Website/PHP/card.php">
     <input type="button" class="button" value="Add your cards"></a><br>
   <a href="">
     <input type="button" class="button" value="Show my cards"></a>
  
</body>
</html>