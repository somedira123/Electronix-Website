<?php
   $login = false;
   $ShowError = false;
 if($_SERVER["REQUEST_METHOD"] == "POST"){
   include 'partials/_dbconnect.php';
   $username = $_POST["username"];
   $password = $_POST["password"];

     $sql = "Select * from users where username = '$username' ";
     $result = mysqli_query($conn, $sql);
     $num = mysqli_num_rows($result);

     if($num == 1)
     {
       while($row = mysqli_fetch_assoc($result))
       {
         if(password_verify($password,$row['password']))
         {
           $login = true;
           session_start();
           $_SESSION['loggedin'] = true;
           $_SESSION['username'] = $username;
           header("location: welcome.php");
         }
         else{
          $ShowError = "Invalid Credentials";
        }
       }
     }

   else{
     $ShowError = "Invalid Credentials";
   }
  }
 ?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>SIGN IN</title>
  <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script> -->
  <!-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">


  <style>
    * {
    box-sizing: border-box;
    font-size: px;
  }

  body {
    font-family: Arial, Helvetica, sans-serif;
    background-color: #A1D8F7;
  }

  button {
    color: black;
    background-color: #FC1704;
    /* font-size: 40px; */
    border-radius: 20px;
    /* margin:10px 0px 0px 0px; */
    width: 90%;
    cursor: pointer;
  }

  button:hover {
    background-color: rgb(219, 117, 117);
  }

  button:active{
    background-color: #fff;
  }

  button:visited {
    background-color: teal;
  }

  a {
    text-decoration: none;
  }

  a:hover{
    background-color: rgb(219, 117, 117);
  }

  a:visited {
    background-color: teal;
  }

  a:active{
    background-color: #fff;
  }

  input {
    /* font-size: 40px; */
    border-radius: 20px;
    border-color: #FC1704;
    width: 90%;
  }

  .mycard {
    border-radius: 15px;
    background-color: white;
    margin-right: 50%;
    padding: 10px 60px 20px 60px;
    margin: 0;
    position: absolute;
    top: 50%;
    left: 50%;
    -ms-transform: translate(-50%, -50%);
    transform: translate(-50%, -50%);
  }

  h1 {
    text-align: center;
  }
   </style>

  
</head>

<body>

<?php require 'partials/_nav.php' ?>

<?php
if($login){
 echo ' <div class="alert alert-warning alert-dismissible fade show" role="alert">
    <strong>Congratulations!</strong> You are now Signed In.
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div> ';
}

if($ShowError){
 echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
    <strong>ERROR!</strong> '. $ShowError.'
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>';
}
?>


<div class="mycard">
      <form action="/Electronix-Website/PHP/sign in.php" method="post">
      <h3>SIGN UP</h3>
      
      <label for="Username"> Enter account name</label>
      <div>
        <input type="text" name="username" id="username" />
      </div>

      <label for="Password"> Password</label>
      <div>
        <input type="password" name="password"  id="password" />
      </div>
      <br>

      <div>
      <button>SIGN IN</button>
      </div>

    </form>
      <hr />
      <h5>New?</h5>
      <a href="/Electronix-Website/PHP/sign up.php">
      <button class=signin>SIGN UP</button> 
    </a>
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