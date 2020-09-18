<?php
$servername="localhost";
$username="root";
$password="";
$dbname="college";

$conn=new mysqli($servername,$username,$password,$dbname);

if($conn->connect_error) {
    die("connection failed:".$conn->connect_error);
}
$usn=$_GET['usn'] ;
 $_GET['name'];
 $_GET['course_name'];
 $_GET['test1'];
 $_GET['test2'];
 $_GET['test3'];
 $_GET['finalia'];
 $sql="UPDATE `result` set finalia=case when test1<test2  and test1<test3 then round((test2+test3)/2)
 when test2<test3 then round((test1+test3)/2)
 else round((test1+test2)/2)
 end where finalia is NULL";

 if($conn->query($sql)==TRUE)
 {
 	echo "updated";
 }
 else {
 	echo "not updated";
 }

?>