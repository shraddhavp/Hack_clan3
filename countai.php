<?php
$servername="localhost";
$username="root";
$password="";
$dbname="college";

$conn=new mysqli($servername,$username,$password,$dbname);

if($conn->connect_error) {
    die("connection failed:".$conn->connect_error);
}
$row1=mysqli_query($conn,"CALL `countai`(@p0)");
echo "<tr><th>no of students:</th></tr>";
while($cols1=mysqli_fetch_array($row1)){
echo "<tr>
<td>$cols1[0]</td>
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