<!DOCTYPE html>
<html>
<head>
<title>Upload Image using form</title>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>

<body>
<form action="index.php" method="POST" enctype="multipart/form-data">
	<input type="file" name="image"><input type="submit" name="submit" value="upload">
</form>

<?php

if(isset($_POST['submit']))
{
	mysql_connect("localhost","root","");
	mysql_select_db("test");
	
	$imageName=mysql_real_escape_string($_FILES["image"]["name"]);
	$imageData=mysql_real_escape_string(file_get_contents($_FILES["image"]["tmp_name"]));
	$imageType=mysql_real_escape_string($_FILES["image"]["type"]);
	
	if (substr($imageType,0,5) == "image")
	{
		mysql_query("INSERT INTO 'blob' VALUES('2','$imageName','$imageData')");
		echo "Success";
	}
	else
	{
		echo "Only images allowed";
	}
}
?>




</body>
</html>