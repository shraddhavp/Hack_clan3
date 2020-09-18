<?php
$conn= mysqli_connect('localhost','root','');
mysqli_select_db($conn,'college');
$sql="DELETE FROM `department`  WHERE dept_no='$_GET[dept_no]'";
if(mysqli_query($conn,$sql))
header("refresh:1;url=deletedept.php");
else
echo "not deleted";

?>