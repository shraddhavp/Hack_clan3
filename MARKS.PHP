<?php
$servername="localhost";
$username="root";
$password="";
$dbname="college";

$conn=new mysqli($servername,$username,$password,$dbname);

if($conn->connect_error) {
    die("connection failed:".$conn->connect_error);
}
$n=$_POST["usn"];
$sql="SELECT * FROM `result`WHERE usn='$n'";

if($conn->query($sql)==TRUE)
{
	$result=mysqli_query($conn,$sql);
if(mysqli_num_rows($result)>0){
echo "<table border size=4>";
echo "<tr>
<th>USN</th>
<th>NAME</th>
<th>COURSE_NAME</th>
<th>TEST1</th>
<th>TEST2</th>
<th>TEST3</th>
<th>FINALIA</th>
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
    echo "NO RESULT FOUND";
}}
echo "</table>";
?>
<html>
<head>
  <script>
window.onload = function () {

var chart1 = new CanvasJS.Chart("chartContainer1", {
  animationEnabled: true,
  theme: "light2", // "light1", "light2", "dark1", "dark2"
  title:{
    text: "Student Attendance "
  },
  axisY: {
    title: "Attendance"
  },
  dataPointWidth: 10,
  data: [{        
    type: "column",  
    showInLegend: true, 
    legendMarkerColor: "grey",
    dataPoints: [      
      { y: 30, label: "January" },
      { y: 26,  label: "February" },
      { y: 100,  label: "March" },
      { y: 50,  label: "April" },
      { y: 75,  label: "May" },
      { y: 80, label: "June" },
      { y: 90,  label: "July" }
      

    ]
  }]
});
chart1.render();
}
</script>
</head>
<body>
<br>
<br>
 <script type="text/javascript" src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
<div id="chartContainer1" style="height: 200px; width: 100% ;"></div>
<a href="iamarks.html">back to view ia marks</a>
</body>
</html>
