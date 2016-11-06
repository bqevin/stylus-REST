<html>
<head>
	<title>Add Update</title>
</head>

<body>
<?php
//including the database connection file
include_once("config.php");

if(isset($_POST['Submit'])) {	
	$name = "Stylus DJ Awards"; // $_POST['name']; am hardcoding this to Stylus Deejay Awards
	$status=$_POST['status'];
	$image=$_POST['image'];	
	$profilePic= "https://pbs.twimg.com/profile_images/506465601066242048/hU6TEG89.jpeg"; //$_POST['profilePic'] .. Have to hardcode this to Twitter prof pic
	$url=$_POST['url'];	
		
	// checking empty fields
	if(empty($name) || empty($status) || empty($image)) {
				
		if(empty($name)) {
			echo "<font color='red'>Name field is empty.</font><br/>";
		}
		
		if(empty($status)) {
			echo "<font color='red'>Status field is empty.</font><br/>";
		}
		
		if(empty($image)) {
			echo "<font color='red'>Poster field is empty.</font><br/>";
		}
		if(empty($profilePic)) {
			echo "<font color='red'>Profile Pic field is empty.</font><br/>";
		}
		if(empty($url)) {
			echo "<font color='red'>Use 'null' if no URL</font><br/>";
		}
		
		//link to the previous page
		echo "<br/><a href='javascript:self.history.back();'>Go Back</a>";
	} else { 
		// if all the fields are filled (not empty) 
			
		//insert data to database	
		$result = mysqli_query($mysqli, "INSERT INTO updates(name,status,image,profilePic,url,timeStamp) VALUES('$name','$status','$image','$profilePic', '$url', NOW())");
		
		//display success message
		echo "<font color='green'>Data added successfully. <br>";
		echo "<br>Name" . $name . "<br>Status" . $status . "<br>Image" . $image . "<br>Profile" . $profilePic . "<br>URL" .$url;
		echo "<br/><a href='index.php'>View Result</a>";
	}
}
?>
</body>
</html>
