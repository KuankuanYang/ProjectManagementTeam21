<?php
	//Database Info
	$host = "localhost";
	$user = "root";
	$password = "123456"; // change the information about database when you configure it on your computer
	$db = "Bulletin_Board";

	//Connect Database
	$conn = mysql_connect($host,$user,$password) or die ("Cannot connect to the database: " . mysql_error());
	mysql_select_db($db,$conn) or die ("Cannot connect to the database: " . mysql_error());
	mysql_query("set names utf8");

	/*---test---	
	if ($conn = mysql_connect($host,$user,$password,$db)) {			
		echo "Connected.";
	} else {
		die (mysql_error());
	}
	*/

	date_default_timezone_set("Europe/Stockholm"); 
?>
