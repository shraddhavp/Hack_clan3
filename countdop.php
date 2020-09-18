<?php
$servername="localhost";
$username="root";
$password="";
$dbname="college";

$conn=new mysqli($servername,$username,$password,$dbname);

if($conn->connect_error) {
    die("connection failed:".$conn->connect_error);
}
$row2=mysqli_query($conn,"CALL `countdop`(@p0)");
echo "<tr><th>no of students:</th></tr>";
while($cols2=mysqli_fetch_array($row2)){
echo "<tr>
<td>$cols2[0]</td>
</tr>";
}
?>
<html>
<body>
<br>
<br>
<a href="professor.html">back</a>
</body>
</html>