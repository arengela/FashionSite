<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>BLOB Data Type Tutorial</title>



<style>
div{	
	margin : 100px;
	width : 100px;
	height : 100px;
	background : red;
	
}


</style>




</head>

<body>

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

$imageData = $row["image"];
//header("content-type: image/jpeg");
//echo $imageData;

?>
		
<SCRIPT Language="JavaScript">
<!-- 

document.write('<table border="1" cellspacing="1" cellpadding="5">')

for(i = 0; i < 3; i++){


   document.write('<tr>')
   document.write('<td><?php echo '<img src="showimage2.php?id='. mysql_insert_id() .'/>" width="100"';?></td>')
   document.write('<td	><img src="http://cdn2.purseblog.com/images/2010/05/Louis-Vuitton-Speedy.jpg" alt="description here" /></td>')
   document.write('<td><img src="http://cdn2.purseblog.com/images/2010/05/Louis-Vuitton-Speedy.jpg" alt="description here" /></td>')
   document.write('</tr>')
}

document.write('</table>')

//-->
</SCRIPT>		
		




<?php		
	};
?>
</body>
</html>
	