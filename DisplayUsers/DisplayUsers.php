<!DOCTYPE html>
<html>
<title>User's Table</title>
<style>
table, th, td {
border: solid 1px ;
width: 200px;
color: #ff0000;
font-family: monospace;
font-size: 25px;
text-align: left;
}
</style>
<body>
<p>Here is the user table<p><br>
<table>
<tr>
<th>UserID</th>
</tr>
<?php
$conn = mysqli_connect("129.237.87.5", "a332l217", "Wongait4", "a332l217");
// Check connection
if ($conn->connect_error) {
die("Connection failed: " . $conn->connect_error);
}
$sql = "SELECT * FROM Users";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
// output data of each row
while($row = $result->fetch_assoc()) {
echo "<tr><td>" . $row["UserID"]. "</td>";
}
echo "</table>";
} else { echo "0 results"; }
$conn->close();
?>
</table>


</body>



</html>

