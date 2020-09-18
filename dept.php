<?php
$servername="localhost";
$username="root";
$password="";
$dbname="college";

$conn=new mysqli($servername,$username,$password,$dbname);

if($conn->connect_error) {
    die("connection failed:".$conn->connect_error);
}
$dept_no=$_POST["dept_no"];
$name=$_POST["name"];
$professor_name=$_POST["profname"];
$sql="INSERT INTO `department`(`dept_no`, `name`, `professor_name`) VALUES ('$dept_no','$name','$professor_name')";
if($conn->query($sql) == TRUE) {
echo "new record created successfully";
}
else{
echo "error:".$sql."<br>".$conn->error;
}
$conn->close();
?>
<html>
<body>
<br>
<br>
<a href="admin.html">back to menu page
</a>
</body>
</html>