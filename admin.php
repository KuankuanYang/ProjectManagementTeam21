<?php
	session_start();
	include "inc/connectDB.php";

	//头部导航
	if(isset($_SESSION["username"])){
	$username=$_SESSION["username"];
	$userinfo=mysql_query("select * from user where username='$username'");
	$user=mysql_fetch_array($userinfo);
	$uid=$user['uid'];
	$name=$user['name'];
	$admin=$user['isAdmin'];
	}
	else{
		header("Location:/ProjectManagementTeam21/index.php");
	}

?>