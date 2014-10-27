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
		padding:5px;
	}
	#nav {
		line-height:30px;
		background-color:#eeeeee;
		height:300px;
		width:100px;
		float:left;
		padding:5px; 
	}
	#section {
		width:350px;
		float:left;
		padding:10px; 
		margin:30px;
	
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


	.ui-dialog { 
		box-shadow: 10px 10px 5px #888888;

	} 

	.ui-widget-content {
	  background-color: white;
	  border: 1px solid #DDDDDD;
	  color: #333333;
	  }

	#dialog{
	 font-size:10px;
	 padding:10px;
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
	<input type="button" id="button" value="Click to open the dialog">

	<div id="dialog" title="Upload Image">
		<div id="section">
			<div id="form">
				<form action="index.php" method="POST" enctype="multipart/form-data">
					<input type="file" name="image"><br>
					brand: <input type="text" name="brand"><br>
					<input type="submit" name="submit" value="" class="imgClass"/><br>
				</form>
				<script>
					 $("#form").trigger( "reset" );
				</script>
				
			</div>

			<script>

			  $(function() {
				$( "#dialog" ).dialog({
				  autoOpen: false,
				  modal:false,
				  width:'500px',


		    	  buttons: {
					Done: function() {
						$( this ).dialog( "close" );
					}
				   },
				   				  
				});
				$("#button").on("click", function() {
					$("#dialog").dialog("open");
				});
			  }); 
			</script>



			<?php

			if(isset($_POST['submit']))
			{
				mysql_connect("localhost","root","");
				mysql_select_db("test");
	
				$brand=$_POST["brand"];
				$imageName = mysql_real_escape_string($_FILES["image"]["name"]);
				$imageData = mysql_real_escape_string(file_get_contents($_FILES["image"]["tmp_name"]));
				$imageType = mysql_real_escape_string($_FILES["image"]["type"]);
	
				if(substr($imageType,0,5) == "image")
				{
					mysql_query("INSERT INTO `blob` VALUES('','$imageName','$imageData','$brand')");
					echo "Image Uploaded!";
					printf("Last inserted record has id %d\n", mysql_insert_id());
					echo '<img src="showimage.php?id='. mysql_insert_id() . '/>" width="100"';

				}
				else
				{
					echo "Only images are allowed!";
				}
			}
			else{
				echo "Not clicked";
			}

			?>
		</div>
	</div>

</body>
</html>