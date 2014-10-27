


<?php
$dbhost = 'localhost:3036';
$dbuser = 'root';
$dbpass = '';
$conn = mysql_connect("localhost", "root", "");
if(! $conn )
{
  die('Could not connect: ' . mysql_error());
}
echo 'Connected successfully';
$sql = 'CREATE Database test_db';
$retval = mysql_query( $sql, $conn );
if(! $retval )
{
  die('Could not create database: ' . mysql_error());
}
echo "Database test_db created successfully\n";
mysql_close($conn);
?>