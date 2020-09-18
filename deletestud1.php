<?php
$conn= mysqli_connect('localhost','root','');
mysqli_select_db($conn,'college');
$sql="DELETE FROM `student`  WHERE usn='$_GET[usn]'";
if(mysqli_query($conn,$sql))
header("refresh:1;url=deletestud.php");
else
echo "not deleted";

?>