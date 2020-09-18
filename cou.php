<?php
$servername="localhost";
$username="root";
$password="";
$dbname="college";

$conn=new mysqli($servername,$username,$password,$dbname);

if($conn->connect_error) {
    die("connection failed:".$conn->connect_error);
}
$cou_no=$_POST["course_code"];
$name=$_POST["couname"];
$od=$_POST["dname"];
$type=$_POST["type"];
$sql="INSERT INTO `course`(`course_code`, `name`, `offering_dept`, `type`) VALUES ('$cou_no','$name','$od','$type')";
if($conn->query($sql) == TRUE) {
echo "new record created successfully";
}
else{
echo "error:".$sql."<br>".$conn->error;
}
$conn->close();
?>