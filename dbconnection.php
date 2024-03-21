<?php
	/*
	$con = mysql_connect("localhost","root", "root");
	if (!$con) 
	{
		die('Could not connect: ' . mysql_error());
	}
	mysql_select_db("elearnings", $con);
	*/
?>

<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "elearnings";

// Create connection
$con = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($con->connect_error) {
	die("Connection failed: " . $con->connect_error);
}
echo "Connected successfully";
?>