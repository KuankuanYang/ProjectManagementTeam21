<?php
include "connectDB.php";

$sql="select * from user where username='$_POST[username]'";
$result=mysql_query($sql) or die('MySQL Error: ' . mysqli_error());
$row=mysql_fetch_array($result) or die('MySQL Error: ' . mysqli_error());

if($row['password'] != $_POST['password'])
	echo('failed');
else 
{
	if(!isset($_SESSION))
		session_start();
        $_SESSION["username"]=$row['name'];

        $_SESSION["log"]="YES"; 
	
}



//echo isset($_SESSION["log"]);
//echo $_SESSION["username"];

header("location: /ProjectManagementTeam21/index.php");
?>