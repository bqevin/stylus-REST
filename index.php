<?php
//including the database connection file
include_once("config.php");

//fetching data in descending order (lastest entry first)
//$result = mysql_query("SELECT * FROM users ORDER BY id DESC"); // mysql_query is deprecated
$result = mysqli_query($mysqli, "SELECT * FROM updates ORDER BY id DESC"); // using mysqli_query instead
?>

<html>
<head>	
	<title>Stylus Homepage</title>
</head>

<body>
<a href="add.html">Add New Data</a><br/><br/>

	<table width='80%' border=0>

	<tr bgcolor='#CCCCCC'>
		<td>Name</td>
		<td>Poster Update</td>
		<td>Status Update</td>
		<td>Profile Pic</td>
		<td>Timestamp</td>
		<td>URL</td>
		<td>Update</td>
	</tr>
	<?php 
	//while($res = mysql_fetch_array($result)) { // mysql_fetch_array is deprecated, we need to use mysqli_fetch_array 
	while($res = mysqli_fetch_array($result)) { 		
		echo "<tr>";
		echo "<td>".$res['name']."</td>";
		echo "<td><img width='100%' src ='".$res['image']."'></td>";
		echo "<td>".$res['status']."</td>";	
		echo "<td><img width='100%' src ='".$res['profilePic']."'></td>";	
		echo "<td>".$res['timeStamp']."</td>";	
		echo "<td>".$res['url']."</td>";		
		echo "<td><a href=\"edit.php?id=$res[id]\">Edit</a> | <a href=\"delete.php?id=$res[id]\" onClick=\"return confirm('Are you sure you want to delete?')\">Delete</a></td>";		
	}
	?>
	</table>
</body>
</html>
