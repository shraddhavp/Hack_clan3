<?php
$servername="localhost";
$username="root";
$password="";
$dbname="college";

$conn=new mysqli($servername,$username,$password,$dbname);

if($conn->connect_error) {
    die("connection failed:".$conn->connect_error);
}
$SSN=$_POST["ssn"];
$NAME=$_POST["name"];
$PHONE=$_POST["phone"];
$DOB=$_POST["dob"];
$EMAIL=$_POST["email"];
$SALARY=$_POST["salary"];
$DESIGNATION=$_POST["designation"];
$SEC_NO=$_POST["section_no"];
$DEPT_NO=$_POST["department_no"];
$QUALIFICATION=$_POST["qualification"];
$sql="INSERT INTO `professor`(`ssn`, `name`, `phone`, `dob`, `email`, `salary`, `designation`, `sec_no`, `dept_no`, `qualification`) VALUES ('$SSN','$NAME','$PHONE','$DOB','$EMAIL','$SALARY','$DESIGNATION','$SEC_NO','$DEPT_NO','$QUALIFICATION')";
if($conn->query($sql) == TRUE) {
echo "new record created successfully";
}
else{
echo "error:".$sql."<br>".$conn->error;
}
echo "<a href=firstloginprof.html>back </a>";
$conn->close();
?>
