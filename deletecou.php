<html>
<head>
<title>delete</title>
</head>
<body>
<table border=1 cellpadding=1 cellspacing=1>
<tr>
<th>COURSE_CODE</th>
<th>NAME</th>
<th>OFFERING_DEPT</th>
<th>TYPE</th>
</tr>
<?php
$conn= mysqli_connect('localhost','root','');
mysqli_select_db($conn,'college');
$sql="SELECT * FROM `course`";
$records=mysqli_query($conn,$sql);
while($row=mysqli_fetch_array($records))
{
	echo "<tr>";
	echo "<td>".$row['course_code']."</td>";
	echo "<td>".$row['name']."</td>";
	echo "<td>".$row['offering_dept']."</td>";
	echo "<td>".$row['type']."</td>";
	
echo "<td><a href=deletecou1.php?course_code=".$row['course_code'].">DELETE</a></td>";
}
echo "<a href=admin.html>back to menu page </a>";
?>