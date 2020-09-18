<html>
<head>
<title>delete</title>
</head>
<body>
<table border=1 cellpadding=1 cellspacing=1>
<tr>
<th>USN</th>
<th>NAME</th>
<th>DOB</th>
<th>PHONE</th>
<th>EMAIL</th>
<th>DEPARTMENT_NO</th>
<th>GENDER</th>
</tr>
<?php
$conn= mysqli_connect('localhost','root','');
mysqli_select_db($conn,'college');
$sql="SELECT * FROM `student`";
$records=mysqli_query($conn,$sql);
while($row=mysqli_fetch_array($records))
{
	echo "<tr>";
	echo "<td>".$row['usn']."</td>";
	echo "<td>".$row['name']."</td>";
	echo "<td>".$row['dob']."</td>";
	echo "<td>".$row['phone_no']."</td>";
	echo "<td>".$row['email']."</td>";
	echo "<td>".$row['department_no']."</td>";
echo "<td>".$row['gender']."</td>";
echo "<td><a href=deletestud1.php?usn=".$row['usn'].">DELETE</a></td>";

}
echo "<a href=admin.html>back to menu page</a>";
?>
<html>
<body>
<br><br>

</body>
</html>