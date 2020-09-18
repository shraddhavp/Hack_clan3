<html>
<head>
<title>delete</title>
</head>
<body>
<table border=1 cellpadding=1 cellspacing=1>
<tr>
<th>SSN</th>
<th>NAME</th>
<th>PHONE</th>
<th>DOB</th>
<th>EMAIL</th>
<th>SALARY</th>
<th>DESIGNATION</th>
<th>SEC_NO</th>
<th>DEPT_NO</th>
<th>QUALIFICATION</th>
</tr>
<?php
$conn= mysqli_connect('localhost','root','');
mysqli_select_db($conn,'college');
$sql="SELECT * FROM `professor`";
$records=mysqli_query($conn,$sql);
while($row=mysqli_fetch_array($records))
{
	echo "<tr>";
	echo "<td>".$row['ssn']."</td>";
	echo "<td>".$row['name']."</td>";
	echo "<td>".$row['phone']."</td>";
	echo "<td>".$row['dob']."</td>";
	echo "<td>".$row['email']."</td>";
	echo "<td>".$row['salary']."</td>";
	echo "<td>".$row['designation']."</td>";
	echo "<td>".$row['sec_no']."</td>";
    echo "<td>".$row['dept_no']."</td>";
    echo "<td>".$row['qualification']."</td>";
echo "<td><a href=deleteprof1.php?ssn=".$row['ssn'].">DELETE</a></td>";
}
?>
<html>
<body>
<a href="admin.html">back to menu page</a>
<br><br>
</body>
</html>