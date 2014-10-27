<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />


<link rel="stylesheet" href="//code.jquery.com/ui/1.11.2/themes/smoothness/jquery-ui.css">
<script src="//code.jquery.com/jquery-1.10.2.js"></script>
<script src="//code.jquery.com/ui/1.11.2/jquery-ui.js"></script>
 
<style>
	#header {
		background-color:black;
		color:white;
		text-align:center;
		padding:20px;
	}
	#nav {
		line-height:30px;
		background-color:#eeeeee;
		height:350px;
		width:100px;
		float:left;
		padding:5px; 
	}
	#section {
		width:350px;
		float:left;
		background-color:#red;
		padding:0px; 
		margin-left:200px;
		margin-top:20px;

		border:black;
	}

	#form {
		width:50px;
		float:right;
	
	}
	#footer {
		background-color:black;
		color:white;
		clear:both;
		text-align:center;
		padding:5px; 
	}
	#pic1 {
	    position: relative;

		height: 200px;
		width: 100px;
		background-color:black;
		color:white;
		clear:both;
		text-align:left;
		padding:0px; 
	}

	#picbox {
		position:absolute;
		background-color:green;
		color:white;
		clear:both;
		width:250px;
		text-align:center;
		padding:5px; 
	}

	table, th, td {
	   border: 1px solid black;
	   width: 250px;
	   height: 150px;
	}

	

	
	.imgClass { 
	background-image: url(http://3.bp.blogspot.com/-QXk6wOu3vl0/UDMbL-GLfbI/AAAAAAAABkc/VDvzjKa_fHo/s1600/green.gif);
	background-position:  0px 0px;
	background-repeat: no-repeat;
	width: 53px;
	height: 53px;
	border: 0px;
	background-color: white;
	cursor: pointer;
	outline: 0;
	}
	.imgClass:hover{ 
	  background-image: url(http://4.bp.blogspot.com/-k8cwKK6NugE/UDMbLl1DjVI/AAAAAAAABkU/3urbBC7S_Ik/s1600/blue.gif);
	}

	.imgClass:active{
	  background-image: url(http://4.bp.blogspot.com/-k8cwKK6NugE/UDMbLl1DjVI/AAAAAAAABkU/3urbBC7S_Ik/s1600/blue.gif);
	}
</style>


</head>
<body>
	<div id="header">
	</div>


	<div id="nav">
	</div>
	
	
	
	
		<div id="section">
			<div id="form">
				<form action="uploadgrid.php" method="POST" enctype="multipart/form-data">
					brand: <input type="text" name="brand"><br>					
					<input type="file" name="image"><br>
					<input type="file" name="image2"><br>
					<input type="file" name="image3"><br>
					<input type="file" name="image4"><br>
					<input type="submit" name="submit" value="" class="imgClass"/><br>
				</form>
				<script>
					 $("#form").trigger( "reset" );
				</script>				
			</div>
			<?php

			if(isset($_POST['submit']))
			{
				mysql_connect("localhost","root","");
				mysql_select_db("test");
	
				$brand=$_POST["brand"];
				$imageName = mysql_real_escape_string($_FILES["image"]["name"]);
				$imageData = mysql_real_escape_string(file_get_contents($_FILES["image"]["tmp_name"]));
				$imageType = mysql_real_escape_string($_FILES["image"]["type"]);
				
				$imageName2 = mysql_real_escape_string($_FILES["image2"]["name2"]);
				$imageData2= mysql_real_escape_string(file_get_contents($_FILES["image2"]["tmp_name"]));
				$imageType2	 = mysql_real_escape_string($_FILES["image2"]["type"]);
	
				$imageName3 = mysql_real_escape_string($_FILES["image3"]["name3"]);
				$imageData3= mysql_real_escape_string(file_get_contents($_FILES["image3"]["tmp_name"]));
				$imageType3	 = mysql_real_escape_string($_FILES["image3"]["type"]);
				
				$imageName4 = mysql_real_escape_string($_FILES["image4"]["name4"]);
				$imageData4= mysql_real_escape_string(file_get_contents($_FILES["image4"]["tmp_name"]));
				$imageType4	 = mysql_real_escape_string($_FILES["image4"]["type"]);
	
	
				if(substr($imageType,0,5) == "image")
				{
					mysql_query("INSERT INTO `blob` VALUES('','$imageName','$imageData','$imageName2','$imageData2','$imageName3','$imageData3','$imageName4','$imageData4','$brand')");
		
				}
				else
				{
					echo "Only images are allowed!";
				}
				
			}
			
			?>
			
			<table>
			<tr>
				<td align="center" bgcolor= "black">
					<?php
					if(isset($_POST['submit']) & substr($imageType,0,5) == "image")
					{
						echo '<img src="showimage.php?id='. mysql_insert_id() . '/>" width="100"';
					}
					?>
				</td>
	
				<td align="center" bgcolor= "black">
					<?php
					if(isset($_POST['submit']) & substr($imageType,0,5) == "image")
					{
						echo '<img src="showimage2.php?id='. mysql_insert_id() .'/>" width="100"';
					}
					?>
				</td>
			</tr>
			<tr>
				<td align="center" bgcolor= "black">
					<?php
					if(isset($_POST['submit']) & substr($imageType,0,5) == "image")
					{
						echo '<img src="showimage3.php?id='. mysql_insert_id() . '/>" width="100"';
					}
					?>
				</td>
				<td align="center" bgcolor= "black">
					<?php
					if(isset($_POST['submit']) & substr($imageType,0,5) == "image")
					{
						echo '<img src="showimage4.php?id='. mysql_insert_id() . '/>" width="100"';
					}
					?>
				</td>
			</tr>

			</table>
		
		
		</div>
		
		
	
	


</body>
</html>