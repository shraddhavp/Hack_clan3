<?php
$conn= mysqli_connect('localhost','root','');
mysqli_select_db($conn,'college');
$sql="DELETE FROM `section`  WHERE section_no='$_GET[section_no]'";
if(mysqli_query($conn,$sql))
header("refresh:1;url=deletesec.php");
else
echo "not deleted";

?>