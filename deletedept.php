<html>
<head>
<title>delete</title>
</head>
<body>
<table border=1 cellpadding=1 cellspacing=1>
<tr>
<th>DEPT_NO</th>
<th>NAME</th>
<th>PROFESSOR_NAME</th>
</tr>
<?php
$conn= mysqli_connect('localhost','root','');
mysqli_select_db($conn,'college');
$sql="SELECT * FROM `department`";
$records=mysqli_query($conn,$sql);
while($row=mysqli_fetch_array($records))
{
	echo "<tr>";
	echo "<td>".$row['dept_no']."</td>";
	echo "<td>".$row['name']."</td>";
	echo "<td>".$row['professor_name']."</td>";
	
echo "<td><a href=deletedept1.php?dept_no=".$row['dept_no'].">DELETE</a></td>";
}
 echo "<a href=admin.html>back to menu page </a>";
?>
