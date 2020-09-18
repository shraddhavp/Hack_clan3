<?php
$servername="localhost";
$username="root";
$password="";
$dbname="college";

$conn=new mysqli($servername,$username,$password,$dbname);

if($conn->connect_error) {
    die("connection failed:".$conn->connect_error);
}
$row=mysqli_query($conn,"CALL `countcc`(@p0)");
echo "<tr><th>no of students:</th></tr>";
while($cols=mysqli_fetch_array($row)){
echo "<tr>
<td>$cols[0]</td>
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