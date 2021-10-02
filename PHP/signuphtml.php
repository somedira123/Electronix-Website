<?php
$username = $_POST['username'];
$emailid = $_POST['emailid'];
$mobilenumber = $_POST['mobilenumber'];
$password = $_POST['password'];

if(!empty($username) || !empty($emailid) || !empty($mobilenumber) || !empty($password)){
    $host = "localhost";
    $dbusername = "root";
    $dbpassword = "";
    $dbname = "users";

    $conn = new mysqli($host,$dbusername,$dbpassword,$dbname);
    
    if(mysqli_connect_error()){
        die('Error('.mysqli_connect_errno().')'.mysqli_connect_error());
    }
    else{
        $SELECT = "SELECT emailid From register where emailid=? Limit 1";
        $INSERT = "INSERT into register (username,emailid,mobilenumber,password) values (?,?,?,?)";

        $stmt = $conn->prepare($SELECT);
        $stmt->bind_param("s",$emailid);
        $stmt->execute();
        $stmt->bind_result($emailid);
        $stmt->store_result();
        $rnum = $stmt->num_rows;

        if($rnum==0){
            $stmt->close();
            $stmt = $conn->prepare($INSERT);
            $stmt->bind_param("ssis",$username,$emailid,$mobilenumber,$password);
            $stmt->execute();
            echo "New record added successfully";
        }
        else{
            echo "Someone has already registered with this name";
        }
        $stmt->close();
        $conn->close();
    }
}
else{
    echo "All fields are required";
    die();
}

?>