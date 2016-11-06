<html>
<head>
	<title>Add Update</title>
</head>

<body>
<?php
//including the database connection file
include_once("config.php");

if(isset($_POST['Submit'])) {	
	$name = "Stylus DJ Awards"; // Hardcoded Data
	$status=$_POST['status'];
	$image=$_POST['image'];	
	$profilePic= "https://pbs.twimg.com/profile_images/506465601066242048/hU6TEG89.jpeg"; //Stylus twitter prof pic
	$url=$_POST['url'];	
		
	// checking empty fields
	if(empty($url) || empty($status) || empty($image)) {
						
		if(empty($status)) {
			echo "<font color='red'>Status field is empty.</font><br/>";
		}
		
		if(empty($image)) {
			echo "<font color='red'>Poster field is empty.</font><br/>";
		}
		if(empty($url)) {
			echo "<font color='red'>Use 'null' if no URL</font><br/>";
		}
		
		//link to the previous page
		echo "<br/><a href='javascript:self.history.back();'>Go Back</a>";
	} else { 
		// if all the fields are filled (not empty) 
			
		//insert data to database	
		$result = mysqli_query($mysqli, "INSERT INTO updates(id,name,status,image,profilePic,url) VALUES(NULL,'$name','$status','$image','$profilePic', '$url')");
		
		//display success message
		echo "<font color='green'>Data added successfully. <br>";
		echo "<br>Name" . $name . "<br>Status" . $status . "<br>Image" . $image . "<br>Profile" . $profilePic . "<br>URL" .$url;
		echo "<br/><a href='index.php'>View Result</a>";
		header("Location:index.php?message=success");
	}
}
?>
</body>
</html>
