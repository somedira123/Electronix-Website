<?php

$data_file = fopen("example.txt","w");

$username = $_POST["username"];
$emailid = $_POST["emailid"];
$mobilenumber=$_POST["mobile number"];
$password=$_POST["password"];

$conn = new mysqli('localhost','root','','signup');
if($conn->connect_error){
    die('Connection Failed : '.$conn->connect_error);
}
else{
    $stmt = $conn->prepare("insert into registration(username,emailid,mobilenumber,password)values(?,?,?,?)");
    $stmt->bind_param("ssis",$username,$emailid,$mobilenumber,$password);
    $stmt->execute();
    echo "registration successfully....";
    $stmt->close();
    $conn->close();
}

// $text_to_write = $username . " " . $emailid;

// fwrite($data_file,$text_to_write);
// fclose($data_file);
?>