<?php
$servername="localhost";
$username="root";
$password="";
$dbname="college";

$conn=new mysqli($servername,$username,$password,$dbname);

if($conn->connect_error) {
    die("connection failed:".$conn->connect_error);
}
$user=$_POST['username'];
$pass=$_POST['password'];
$sql="INSERT INTO `user`(`username`, `password`) VALUES 
('$user','$pass')";
if($conn->query($sql) == TRUE) {
header("location:index.html");
}
$conn->close();
?>

