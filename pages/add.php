<html>
<head>
	<title>Add Update</title>
</head>

<body>
<?php
//including the database connection file
include_once("config.php");

if(isset($_POST['Submit'])) {	
	$name = mysqli_real_escape_string($mysqli, "Stylus DJ Awards"); // Hardcoded Data
	$status = mysqli_real_escape_string($mysqli, $_POST['status']);
	$image = mysqli_real_escape_string($mysqli, $_POST['image']);	
	$profilePic =mysqli_real_escape_string($mysqli, "https://pbs.twimg.com/profile_images/506465601066242048/hU6TEG89.jpeg"); //Stylus twitter prof pic
	$url=mysqli_real_escape_string($mysqli, $_POST['url']);	
		
	// checking empty status
	if(empty($status)) {
						
		if(empty($status)) {
			echo "<font color='red'>Status field is empty.</font><br/>";
		}
		
		// if(empty($image)) {
		// 	echo "<font color='red'>Poster field is empty.</font><br/>";
		// }
		// if(empty($url)) {
		// 	echo "<font color='red'>Use 'null' if no URL</font><br/>";
		// }
		
		//link to the previous page
		echo "<br/><a href='javascript:self.history.back();'>Go Back</a>";
	} else { 
		// if all the fields are filled (not empty) 
			
		//insert data to database	
		$sqlCommand = "INSERT INTO `updates` (name, status, image, profilePic, url) VALUES('$name', '$status', '$image', '$profilePic', '$url')" ;
		$result = mysqli_query($mysqli, $sqlCommand) or die (mysqli_error($mysqli)); 
		//display success message
		// echo "<font color='green'>Data added successfully. <br>";
		// echo "<br>Name" . $name . "<br>Status" . $status . "<br>Image" . $image . "<br>Profile" . $profilePic . "<br>URL" .$url;
		// echo "<br/><a href='index.php'>View Result</a>";
	    header("Location: agrigender.net/stylus/index.php");
	}
}
?>
</body>
</html>
