<?php
	//Database Info
	$host = "localhost";
	$user = "root";
	$password = "123456";
	$db = "Bulletin_Board";

	//Connect Database
	$conn = mysql_connect($host,$user,$password,$db) or die (mysql_error());
	mysql_query("set names utf8");

	/*---test---	
	if ($conn = mysql_connect($host,$user,$password,$db)) {			
		echo "Connected.";
	} else {
		die (mysql_error());
	}
	*/
?>