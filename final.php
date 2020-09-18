<html>
<head>
<title>update</title>
</head>
<body>
<table border=1 cellpadding=1 cellspacing=1>
<tr>
<th>USN</th>
<th>NAME</th>
<th>COURSE_NAME</th>
<th>TEST1</th>
<th>TEST2</th>
<th>TEST3</th>
<th>FINAL_IA</th>
</tr>
<?php
$conn= mysqli_connect('localhost','root','');
mysqli_select_db($conn,'college');
$sql="SELECT usn,name,course_name,test1,test2,test3,finalia FROM `result`";
$records=mysqli_query($conn,$sql);
while($row=mysqli_fetch_array($records))
{
	echo "<tr>
	 <td>".$row['usn']."</td>
	 <td>".$row['name']."</td>
	 <td>".$row['course_name']."</td>
	 <td>".$row['test1']."</td>
	 <td>".$row['test2']."</td>
	 
 <td>".$row['test3']."</td>
 <td>".$row['finalia']."</td>
 <td><a href='insertfinal.php?usn=$row[usn]&name=$row[name]&course_name=$row[course_name]&test1=$row[test1]&test2=$row[test2]&test3=$row[test3]&finalia=$row[finalia]'>NEXT</a></td>
</tr>";
}
?>