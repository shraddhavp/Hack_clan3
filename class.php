<?php
$servername="localhost";
$username="root";
$password="";
$dbname="college";

$conn=new mysqli($servername,$username,$password,$dbname);

if($conn->connect_error) {
    die("connection failed:".$conn->connect_error);
}
$n=$_POST["name"];
$sql="SELECT * FROM `student`,`professor`,`studsec` WHERE student.usn=studsec.usn and professor.sec_no=studsec.section_no and professor.name='$n'";

if($conn->query($sql)==TRUE)
{
	$result=mysqli_query($conn,$sql);
    if(mysqli_num_rows($result)>0){
echo "<table border size=4>";
echo "<tr>
<th>USN</th>
<th>NAME</th>
<th>DOB</th>
<th>PHONE</th>
<th>EMAIL</th>
<th>DEPARTMENT_NO</th>
<th>GENDER</th>

</tr>";
while($arr=mysqli_fetch_row($result))
{
	echo "<tr>
    <td>$arr[0]</td>
    <td>$arr[1]</td>
    <td>$arr[2]</td>
    <td>$arr[3]</td>
    <td>$arr[4]</td>
    <td>$arr[5]</td>
    <td>$arr[6]</td>

    </tr>
	";
}}
else{
    echo "NO SUCH PROFESSOR FOUND...";
}}

echo "</table>";
if($n=='naveen')
{
    echo "<a href=countcc.php>click here to know the number of students who have taken cc</a>";
}
if($n=='Sarikya S.M.')
{
    echo "<a href=countai.php>click here to know the number of students who have taken ai</a>";
}
if($n=='gaurav')
{
    echo "<a href=countdop.php>click here to know the number of students who have taken dop</a>";
}


?>
<html>
<body>
<br>
<br>
<a href="professor.html">back to menu page</a>
</body>
</html>

