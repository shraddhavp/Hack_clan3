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
$COURSE=$_POST["course"];
$TEST1=$_POST["test1"];
$TEST2=$_POST["test2"];
$TEST3=$_POST["test3"];

$sql="INSERT INTO `result`(`usn`, `name`, `course_name`, `test1`, `test2`, `test3`) VALUES ('$usn','$NAME','$COURSE','$TEST1','$TEST2','$TEST3')";
if($conn->query($sql) == TRUE) {
echo "new record created successfully";
}
else{
echo "error:".$sql."<br>".$conn->error;
}


?>
<html>
<body>
<br>
<br>
<a href="professor.html">back to menu page</a>
</body>
</html>
