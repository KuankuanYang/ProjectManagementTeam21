<?php
session_start();
include("connectDB.php");

$catId=$_GET["cid"];

echo $catId;

if(isset($_SESSION["username"])){
$username=$_SESSION["username"];
echo $username;
$userinfo=mysql_query("select * from user where username='$username'");
$user=mysql_fetch_array($userinfo);
$uid=$user['uid'];
}

echo $uid;

if(isset($_POST['title'])){
$title=trim($_POST['title']);
}


$content=$_POST['content'];


echo $title;
echo $content;

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

header("Location:/ProjectManagementTeam21/topicList.php?cid='$catId'");

/*
$sql = "insert into user(name,username,password,email,gender,cTime) values ('$_POST[name]','$_POST[username]','$_POST[password]','$_POST[email]','$_POST[gender]',now());";

if (!mysql_query($sql))
{
    die('Error: ' . mysql_error());
}

header("Location:/BBS_Website/logIn.php");*/

?>