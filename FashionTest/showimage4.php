<?php

mysql_connect("localhost","root","");
mysql_select_db("test");

if(isset($_GET['id']))
{
	$id = mysql_real_escape_string($_GET['id']);
	$query = mysql_query("SELECT * FROM `blob` WHERE `id`='$id'");
	while($row = mysql_fetch_assoc($query))
	{	
		$imageData4 = $row["image4"];

	}
	header("content-type: image/jpeg");
	echo $imageData4;

}
else
{
	echo "Error!";
}

?>