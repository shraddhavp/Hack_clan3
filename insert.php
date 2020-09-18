<?php
$servername="localhost";
$username="root";
$password="";
$dbname="college";

$conn=new mysqli($servername,$username,$password,$dbname);

if($conn->connect_error) {
    die("connection failed:".$conn->connect_error);
}
$usn=$_POST["usn"];
$NAME=$_POST["name"];
$DOB=$_POST["date"];
$PHONE_NO=$_POST["phone"];
$EMAIL=$_POST["email"];
$DEPARTMENT_NO=$_POST["dept"];
$GENDER=$_POST["gender"];
$sql="INSERT INTO `student`(`usn`, `name`, `dob`, `phone_no`, `email`, `department_no`, `gender`) VALUES 
('$usn','$NAME','$DOB','$PHONE_NO','$EMAIL','$DEPARTMENT_NO','$GENDER')";
if($conn->query($sql) == TRUE) {
echo "new record created successfully";
}
else{
echo "error:".$sql."<br>".$conn->error;
}
echo "<a href=firstloginstud.html>back </a>";
$conn->close();
?>

