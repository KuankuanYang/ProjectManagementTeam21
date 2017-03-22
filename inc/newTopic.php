<?php
session_start();
include("connectDB.php");

$catId=$_GET["cid"];

//echo $catId;

if(isset($_SESSION["username"])){
	$username=$_SESSION["username"];
	//echo $username;
	$userinfo=mysql_query("select * from user where username='$username'");
	$user=mysql_fetch_array($userinfo);
	$uid=$user['uid'];
}

//echo $uid;
$title=$_POST['title'];
$content=$_POST['content'];

//print_r($title);

if((!empty($title))&&(!empty($content)))
{
    $sql = "INSERT INTO topic (categoryId, userId, title, content, topTime) VALUES ('$catId', '$uid', '$title', '$content', now());";
    $conn = mysql_query($sql);
    if (!$conn) 
    {
        echo 'Mysql error: ' . mysql_error();
        exit;
    }

}

$redirect="Location:/ProjectManagementTeam21/topicList.php?cid=".$catId;
header($redirect);
?>