<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>BLOB Data Type Tutorial</title>

<style>
table, th, td {
	   border: 1px solid black;
	   width: 250px;
	   height: 150px;
	}
</style>




</head>
<body>






<form>
brand: <input type="text" name="brand"><br>
<input type="submit" name="submit" value="Filter"><br>
</form>





<?php

mysql_connect("localhost","root","");
mysql_select_db("test");


$x=1;

if ($_GET["brand"]==''){
	$query = mysql_query("SELECT * FROM `blob`");
}
else {
$query = mysql_query("SELECT * FROM `blob` WHERE brand= '".
mysql_real_escape_string($_GET["brand"]). "'");
}


while($row = mysql_fetch_assoc($query)){


?>
		<table>
			<tr>
				<td align="center" bgcolor= "black">
					<?php
						echo '<img src="showimage.php?id='. $row['id'] . '/>" width="100"';
					
					?>
				</td>
	
				<td align="center" bgcolor= "black">
					<?php
						echo '<img src="showimage2.php?id='. $row['id'] .'/>" width="100"';
					?>
				</td>
			</tr>
			<tr>
				<td align="center" bgcolor= "black">
					<?php
						echo '<img src="showimage3.php?id='. $row['id'] . '/>" width="100"';
					?>
				</td>
				<td align="center" bgcolor= "black">
					<?php
						echo '<img src="showimage4.php?id='. $row['id'] . '/>" width="100"';
					
					?>
				</td>
			</tr>

			</table>
<?php 
}
 ?>



</body>
</html>