<?php
if(isset($_POST['submit'])){
$name=$_POST['name'];
$email=$_POST['email'];
$phone=$_POST['phone'];
$password=$_POST['password'];
$confpassword=$_POST['confpassword'];

$servername = "localhost";
$username = "root";
$password = "YES";
$database = "users";

$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$sql="INSERT INTO `register` (`name`, `email`, `phone`, `password`, `confpassword`) 
VALUES ('$name', '$email', '$phone', '$password', '$confpassword')";
if($password==$confpassword){
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssi", $name, $email, $phone, $password, $confpassword);
    
    if ($stmt->execute()) {
        echo "New record inserted successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$stmt->close();
$conn->close();

}
?>