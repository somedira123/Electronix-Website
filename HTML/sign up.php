<?php include 'partials/_dbconnect.php';
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
      font-size: 20px;
    }

    body {
      font-family: Arial, Helvetica, sans-serif;
      background-color: darkblue;
    }

    button {
      color: black;
      background-color: brown;
      /* font-size: 40px; */
      border-radius: 20px;
      width: 90%;
      cursor: pointer;
    }

    button:hover {
      background-color: rgb(219, 117, 117);
    }

    button:active {
      background-color: #fff;
    }

    button:visited {
      background-color: teal;
    }

    a {
      text-decoration: none;
    }

    a:hover {
      background-color: rgb(219, 117, 117);
    }

    a:visited {
      background-color: teal;
    }

    a:active {
      background-color: #fff;
    }

    input {
      /* font-size: 40px; */
      border-radius: 20px;
      border-color: brown;
      width: 90%;
      text-align: center;
    }

    .mycard {
      border-radius: 15px;
      background-color: white;
      margin-right: 50%;
      padding: 10px 60px 20px 60px;
      margin: 0;
      position: absolute;
      top: 57%;
      left: 50%;
      -ms-transform: translate(-50%, -50%);
      transform: translate(-50%, -50%);
    }

    h3 {
      text-align: center;
    }
  </style>
</head>

<body>
  <?php require 'partials/_nav.php'?>
  

  <div class="alert alert-warning alert-dismissible fade show" role="alert">
    <strong>Congratulations!</strong> Account created successfully.
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>

  <form action="/Website/PHP/signup.php" method="POST">
    <div class="mycard">
      <h3>SIGN UP</h3>
      <label for="Username"> Enter account name</label>
      <div>
        <input type="text" name="username" id="username" />
      </div>
<!-- 
      <label for="Email id"> Enter Email address</label>
      <div>
        <input type="email" name="emailid" id="emailid" />
      </div>

      <label for="Mobile number">Mobile number</label>
      <div> -->
        <!-- <select name="mobile Number" id="Mobile number">
      <option value="india" class="click">+91</option>
      <option value="india" class="click">+91</option>
     </select> -->
<!-- 
        <input type="tel" name="mobilenumber" id="mobilenumber" />
      </div> -->

      <label for="Password"> Password</label>
      <div>
        <input type="password" name="password" id="password" />
      </div>
      <br />

      <!-- <a href="/Website/otp.html">  -->
        <button>CONTINUE</button></a>
      <hr />
      <h5>Already have an account?</h5>
      <a href="/Website/sign in.html"><button>SIGN IN</button> </a>
    </div>
  </form>
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