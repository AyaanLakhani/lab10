<!DOCTYPE html>
<html>
<body>
<table border =\"5\" style='border-collapse: collapse'> 
<b>Posts: </b><br>
<p></p>
<tr>
<th>PostID</th>
<th>Content</th>
<th>AuthorID</th>
</tr>
<?php
$conn = new mysqli("129.237.87.5", "a332l217", "Wongait4", "a332l217");
if ($conn->connect_error)
{
  die("Connection failed: " . $conn->connect_error);
}
$sql = "SELECT * FROM Posts";
$result = $conn->query($sql);
if ($result->num_rows > 0) 
{
   while($row = $result->fetch_assoc()) 
   {
      echo "<tr>";
      echo "<td>" . $row["PostID"]. "</td>";
      echo "<td>" . $row["Content"]. "</td>";
      echo "<td>" . $row["AuthorID"]. "</td>";
      echo "</tr>";
   }
   echo "</table>";
} 

$conn->close();
?>
</table>
</body>
</html>
