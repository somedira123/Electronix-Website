<?php

$server = "localhost";
$username = "root";
$password = "";
$database = "payment";

$conn = mysqli_connect($server,$username,$password,$database);

if(!$conn){
//     echo "Successfully conected";
// }
// else{
    die("Errorrrrrrrrr". mysqli_connect_error());
}

?>