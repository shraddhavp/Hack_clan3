<?php
$servername="localhost";
$username="root";
$password="";
$dbname="college";

$conn=new mysqli($servername,$username,$password,$dbname);

if($conn->connect_error) {
    die("connection failed:".$conn->connect_error);
}
$myusername=$_POST['username'];
$mypassword=$_POST['password'];
$sql="select * from user where username='$myusername' and password='$mypassword'";
$result=mysqli_query($conn,$sql);
$row=mysqli_fetch_array($result);
if(!$row){
	
	echo "username or password is invalid";

}
else
{
	session_start();
	$_SESSION['username']=$myusername;
	$_SESSION['password']=$mypassword;
 header("location:index.html");
}
 ?>