<?php
$conn= mysqli_connect('localhost','root','');
mysqli_select_db($conn,'college');
$sql="DELETE FROM `course`  WHERE course_code='$_GET[course_code]'";
if(mysqli_query($conn,$sql))
header("refresh:1;url=deletecou.php");
else
echo "not deleted";

?>