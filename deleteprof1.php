<?php
$conn= mysqli_connect('localhost','root','');
mysqli_select_db($conn,'college');
$sql="DELETE FROM `professor` WHERE ssn='$_GET[ssn]'";
if(mysqli_query($conn,$sql))
header("refresh:1;url=deleteprof.php");
else
echo "not deleted";

?>