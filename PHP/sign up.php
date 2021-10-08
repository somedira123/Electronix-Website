    <?php
      $ShowAlert = false;
      $ShowError = false;
    if($_SERVER["REQUEST_METHOD"] == "POST")
    {
      include 'partials/_dbconnect.php';
      $username = $_POST["username"];
      $emailid = $_POST["emailid"];
      $mobilenumber = $_POST["mobilenumber"];
      $password = $_POST["password"];
      $cpassword = $_POST["cpassword"];
      //  $exists = false;
      $existSql = "SELECT * FROM `users` WHERE username='$username';";
      $result = mysqli_query($conn, $existSql);
      
      $numExistsRows = mysqli_num_rows($result);

      //  if(empty($username))
      //       {
      //         echo 'Username required';
      //         $ShowError = " All fields are required";
      //       }

      if($numExistsRows > 0)
      {
        //  $exists = true;
        $ShowError = "Username already taken";

      }
      else
      {
        //  $exists = false;

      if(($password == $cpassword) && !(empty($username)) && !(empty($emailid))
        && !(empty($mobilenumber)) && !(empty($password)) && !(empty($cpassword)) )
      {
        $hash = password_hash($password, PASSWORD_DEFAULT);
        $sql = "INSERT INTO `users` (`username`, `emailid`, 
        `mobilenumber`, `password`) VALUES ('$username', 
        '$emailid', '$mobilenumber', '$hash')";

        
        $result = mysqli_query($conn, $sql);

        if($result)
        {
          $ShowAlert = true;
        }
      }
      else
      {
        $ShowError = "Passwords do not match ";
      }
      if (!(empty($username)) && !(empty($emailid))
      && !(empty($mobilenumber)) && !(empty($password)) && !(empty($cpassword))) {
        $hash = password_hash($password, PASSWORD_DEFAULT);
        $sql = "INSERT INTO `users` (`username`, `emailid`, 
        `mobilenumber`, `password`) VALUES ('$username', 
        '$emailid', '$mobilenumber', '$hash')";

        
        $result = mysqli_query($conn, $sql);

        if($result)
        {
          $ShowAlert = true;
        }
      }
      else
      {
        $ShowError = "All fields are required ";
      }
      }
      }

 ?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>SIGN UP</title>
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
    background-color: #FC1704 ;
    /* font-size: 40px; */
    border-radius: 20px;
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
if($ShowAlert){
 echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
    <strong>Congratulations!</strong> Account created successfully.
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


<div class="mycard">
      <form action="/Electronix-Website/PHP/sign up.php" method="post">
      <h3>SIGN UP</h3>
      <label for="Username"> Enter account name</label>
      <div>
        <input type="text" maxlength="10" name="username" id="username" />
      </div>

      <label for="Email id"> Enter Email address</label>
      <div>
        <input type="email" maxlength="10" name="emailid"  id="emailid" />
      </div>

      <label for="Mobile number">Mobile number</label>
      <div>
        <!-- <select name="mobile Number" id="Mobile number">
      <option value="india" class="click">+91</option>
      <option value="india" class="click">+91</option>
     </select> -->

        <input type="phone" maxlength="10" name="mobilenumber"  id="mobilenumber" />
      </div>

      <label for="Password"> Password</label>
      <div>
        <input type="password"  maxlength="10"name="password"  id="password" />
      </div>

      <label for=" Confirm Password">Confirm Password</label>
      <div>
        <input type="password" maxlength="10" name="cpassword"  id="cpassword" />
      </div>
      <br />

      <!-- <a href="/Website/otp.html">  -->
      <button>CONTINUE</button></a>
    </form>
      <hr />
      <h5>Already have an account?</h5>
      <a href="/Electronix-Website/PHP/sign in.php">
      <button>SIGN IN</button> 
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