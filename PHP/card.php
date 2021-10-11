<?php
$ShowAlert = false;
$ShowError = false;
if($_SERVER["REQUEST_METHOD"] == "POST")
{
    include 'partials/payment.php';
    $owner = $_POST["owner"];
    $cvv = $_POST["cvv"];
    $cardnumber = $_POST["cardnumber"];
    $months = $_POST["months"];
    $years = $_POST["years"];

    $exists = false;

    $existSql = "SELECT * FROM `payment` WHERE owner ='$owner';";
      $result = mysqli_query($conn, $existSql);
      $numExistsRows = mysqli_num_rows($result);
      if($numExistsRows > 0)
      {
        //  $exists = true;
        $ShowError = " Owner name or card number invalid";

      }
      else
      {
   

    if(!empty($owner) && !empty($cvv) && !empty($cardnumber) && !empty($months) && !empty($years))
    {
        $hash = password_hash($cvv, PASSWORD_DEFAULT);
        $sql = "INSERT INTO `payment` (`owner`, `cvv`, `cardnumber`, `months`, `years`) 
         VALUES ('$owner', '$hash', '$cardnumber', '$months', '$years')";
    
    
         $result = mysqli_query($conn, $sql);  
        $ShowAlert = true;
    }
    else
    {

         $ShowError="All fields are required";
         

    }
    }
  
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cards</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">

    <style>
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
        *
        {
            font-size: 20px;
        }
        body
        {
            background-color: #A1D8F7;
        }
        .card
        {
            border-radius: 15px;
            background-color: white;
            margin-right: 50%;
            padding: 49px 60px 28px 60px;
            margin: 50px;
            /* position: absolute;
            top: 50%;
            left: 50%; */
            /* -ms-transform: translate(-50%, -50%);
            transform: translate(-50%, -50%); */
        }
        .cvv
        {
            padding: 10px;
            float: right;
            margin: -82px 412px;
            
        }
        .owner
        {
            width: 73%;
        }
        .number
        {
            width: 100%;
        }
        select
        {
            width:10%;
            margin: 3px 0px 0px 0px;
        }
        img
        {
            padding: 10px;
            float: right;
            margin: -247px 93px -39px -24px;
            width: 30%;
        }
        input 
        {
        /* font-size: 40px; */
        border-radius: 20px;
        border-color: darkblue;
        width: 50%;
        margin: 10px;
        }
        .button {
        color: white;
        background-color: darkblue;
        /* font-size: 40px; */
        border-radius: 20px;
        /* margin:10px 0px 0px 0px; */
        width: 51%;
        cursor: pointer;
       }
    </style>
</head>
<body>
<header class="main_header">
    <div class="logo">
        <a href=""><b>ELECTRONIX</b></a>
        <img src="/Electronix-Website/Images/logo.jpg" alt="" height="45px" width="50px">
    </div>
    <div class="search-container">
        <form action="/action_page.php">
            <input type="text" placeholder="Search for products" name="search">
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

<?php
if($ShowAlert){
 echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
    <strong>Congratulations!</strong> Card added successfully.
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>';
}

if($ShowError){
 echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
    <strong>ERROR!</strong> '.$ShowError.'
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>';
}
?>
    <h1>Enter details</h1>
    <div class="card">

    <form action="/Electronix-Website/PHP/card.php" method="post">
    
    <div class="owner">
        <label for="owner">Owner</label><br>
        <input type="text" name="owner" id="owner">
    </div>
    
    <div class="cvv">
        <label for="cvv">CVV</label><br>
        <input type="password" name="cvv" id="cvv">
    </div>
    
    <div class="number">
        <label for="cardnumber">Card number</label><br>
        <input type="number" name="cardnumber" id="cardnumber">
    </div>
    
    <div class="date">
        <label for="date">Expiration date</label><br>
        <select name="months" id="months">
            <option value="Jan">Jan</option>
            <option value="Feb">Feb</option>
            <option value="Mar">Mar</option>
            <option value="Apr">Apr</option>
            <option value="May">May</option>
            <option value="Jun">Jun</option>
            <option value="Jul">Jul</option>
            <option value="Aug">Aug</option>
            <option value="Sep">Sep</option>
            <option value="Oct">Oct</option>
            <option value="Nov">Nov</option>
            <option value="Dec">Dec</option>
        </select>
        
        <select name="years" id="years">
            <option value="2020">2020</option>
            <option value="2021">2021</option>
            <option value="2022">2022</option>
            <option value="2023">2023</option>
            <option value="2024">2024</option>
            <option value="2025">2025</option>
        </select>
    </div>
    
    <div>
        <img src="/Electronix-Website/Images/payment.jpg" alt="payment.jpg" srcset="">
    </div>
    
    <div>
        <input type="submit" name="button" id="button" class="button" value="DONE">
    </div>
</form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ"
    crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"
    integrity="sha384-W8fXfP3gkOKtndU4JGtKDvXbO53Wy8SZCQHczT5FMiiqmQfUpWbYdTil/SxwZgAN"
    crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.min.js"
    integrity="sha384-skAcpIdS7UcVUC05LJ9Dxay8AXcDYfBJqt1CJ85S/CFujBsIzCIv+l9liuYLaMQ/"
    crossorigin="anonymous"></script>
</body>
</html>