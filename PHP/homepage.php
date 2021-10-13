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
    <title>ELECTRONIX | E-Commerce Website</title>
    <link rel="icon" href="images/logo.jpg">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="/Electronix-Website/CSS/style.css">
<style>
    
    body {
        margin: 0;
        padding: 0;
        font-family: Arial, Helvetica, sans-serif;
        background-color: #A1D8F7;
      }
      a{
          color: darkblue;
      }
      .btnclass{
  border: 2px solid black;
    outline: 0;
    padding: 12px;
    color: white;
    background-color: darkblue;
    text-align: center;
    cursor: pointer;
    width: 100%;
    font-size: 18px;
}
.btnclass:hover{
    background-color: lightblue;
    color: black;
}
.btnsearch{
  border: none;
    outline: 0;
    padding: 12px;
    color: white;
    background-color: #000;
    text-align: center;
    cursor: pointer;
    width: 6.5%;
    font-size: 18px;
}
</style>
    </head>
   
<body>
    <header class="main_header">
        <div class="logo">
            <a href="/Electronix-Website/HTML/homepage.html"><b>ELECTRONIX</b></a>
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
                <a href="FAQ.html">FAQ</a>
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
                <i class="fas fa-shopping-cart"></i>
            </div>
        </div>
    </header>
    
   
    Welcome - <?php echo $_SESSION['username'] ?>
    
    <div class="h1photo">
        <img src="/Electronix-Website/Images/h1_photo.jpeg" alt="refreshit" width="100%" height="610px">
    </div>




    <div class="category_container">
        <h1 class="heading">Shop By Category</h1>
        <div class="box-container">
            <a href="">
                <div class="box">
                    <div class="icon">
                        <span class="fas fa-gift"></span>
                    </div>
                    <h3 class="title">Offers</h3>
                </div>
            </a>
            <a href="/Electronix-Website/HTML/mobile.html">
                <div class="box">
                    <div class="icon">
                        <span class="fas fa-mobile"></span>
                    </div>
                    <h3 class="title">Mobile</h3>
                </div>
            </a>
            <a href="/Electronix-Website/HTML/laptop.html">
                <div class="box">
                    <div class="icon">
                        <span class="fas fa-laptop"></span>
                    </div>
                    <h3 class="title">Laptop</h3>
                </div>
            </a>
            <a href="/Electronix-Website/HTML/tv.html">
                <div class="box">
                    <div class="icon">
                        <span class="fas fa-tv"></span>
                    </div>
                    <h3 class="title">TV</h3>
                </div>
            </a>
            <a href="/Electronix-Website/HTML/tablet.html">
                <div class="box">
                    <div class="icon">
                        <span class="fas fa-tablet-alt"></span>
                    </div>
                    <h3 class="title">Tablet</h3>
                </div>
            </a>
        </div>
    </div>



    
    <!---TRENDING OFFERS -->

   <section class="products" id="products">
    <h1 class="heading">Trending Offers</h1>

    <div class="box_container">
        <div class="box">
            <img src="/Electronix-Website/Images/trending-laptop.jpg" alt="">
            <div class="content">
                <h3>LAPTOP</h3>
                <h4>UPTO 36% OFF</h4>
                <a href="/Electronix-Website/HTML/laptop.html"><button class="btnclass">View Offers</button></a>
            </div>
        </div>

        <div class="box">
            <img src="/Electronix-Website/Images/trending-mobile.jpg" alt="">
            <div class="content">
                <h3>MOBILE</h3>
                <h4>UPTO 37% OFF</h4>
                <a href="/Electronix-Website/HTML/mobile.html"><button class="btnclass">View Offers</button></a>
            </div>
        </div>

        <div class="box">
            <img src="/Electronix-Website/Images/trending-tablet.jpg" alt="">
            <div class="content">
                <h3>TABLET</h3>
                <h4>UPTO 40% OFF</h4>
                <a href="/Electronix-Website/HTML/tablet.html"><button class="btnclass">View Offers</button></a>
            </div>

        </div>

        <div class="box">
            <img src="/Electronix-Website/Images/trending-tv.jpg" alt="">
            <div class="content">
                <h3>TV</h3>
                <h4>UPTO 25% OFF</h4>
                <a href="/Electronix-Website/HTML/tv.html"><button class="btnclass">View Offers</button></a>
            </div>
        </div>
    </div>

</section>

   <!---BEST SELLER -->
   <section class="products" id="products">
    <h1 class="heading">Bestsellers</h1>
    <div class="box_container">
        <div class="box">
            <img src="/Electronix-Website/Images/best-HP14s.jpeg" alt="">
            <div class="content">
                <h3>HP 14s</h3>
                <p>UPTO 12% OFF</p>
                <div class="price">₹40,000 <span>₹45,892</span></div>
                <div class="stars">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="far fa-star"></i>
                </div>
                <a href="/Electronix-Website/HTML/cart.html"><button class="btnclass">Add to cart</button></a>
            </div>
        </div>

        <div class="box">
            <img src="/Electronix-Website/Images/best-Oppo-a53.jpeg" alt="">
            <div class="content">
                <h3>OPPO A53</h3>
                <p>UPTO 25% OFF</p>
                <div class="price">₹11,990 <span>₹15,990</span></div>
                <div class="stars">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="far fa-star"></i>
                </div>
                <a href="/Electronix-Website/HTML/cart.html"><button class="btnclass">Add to cart</button></a>
            </div>
        </div>

        <div class="box">
            <img src="/Electronix-Website/Images/best-Lenovo-Tab-P11-Pro.jpeg" alt="">
            <div class="content">
                <h3>Lenovo Tab</h3>
                <p>UPTO 25% OFF</p>
                <div class="price">₹44,990 <span>₹60,000</span></div>
                <div class="stars">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="far fa-star"></i>
                </div>
                <a href="/Electronix-Website/HTML/cart.html"><button class="btnclass">Add to cart</button></a>
            </div>
        </div>
        
        <div class="box">
            <img src="/Electronix-Website/Images/best-SAMSUNG-Crystal-4K-108cm.jpeg" alt="">
            <div class="content">
                <h3>LED Smart TV</h3>
                <p>UPTO 26% OFF</p>
                <div class="price">₹38,990 <span>₹52,900</span></div>
                <div class="stars">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="far fa-star"></i>
                </div>
                <a href="/Electronix-Website/HTML/cart.html"><button class="btnclass">Add to cart</button></a>
            </div>
        </div>
    </div>
</section>


    <div class="service_container">
        <h1 class="heading">Our Services</h1>
        <div class="box-container">
            <a href="">
                <div class="box">
                    <div class="icon">
                        <span class="fas fa-shipping-fast"></span>
                    </div>
                    <h3 class="title">Fast Delivery</h3>
                </div>
            </a>
            <a href="">
                <div class="box">
                    <div class="icon">
                        <span class="fas fa-undo-alt"></span>
                    </div>
                    <h3 class="title">10 Days Return Policy</h3>
                </div>
            </a>
            <a href="">
                <div class="box">
                    <div class="icon">
                        <span class="far fa-credit-card"></span>
                    </div>
                    <h3 class="title">Easy Installments</h3>
                </div>
            </a>
            <a href="">
                <div class="box">
                    <div class="icon">
                        <span class="fas fa-hands-helping"></span>
                    </div>
                    <h3 class="title">24x7 Support</h3>
                </div>
            </a>
        </div>
    </div>


    <footer>
        
        <div class="center">
            Copyright &copy; www.electronix.com All rights reserved!
        </div>
    </footer>
</body>

</html>
</body>
</html>