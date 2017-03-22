<?php
session_start();
include("connectDB.php");

$topId=$_GET["tid"];

//echo $topId;

if(isset($_SESSION["username"])){
$username=$_SESSION["username"];
$userinfo=mysql_query("select * from user where username='$username'");
$user=mysql_fetch_array($userinfo);
$uid=$user['uid'];
}

//echo $uid;

$comment=$_POST['comment'];

//echo $title;
//echo $comment;

if(!empty($comment))
{
    $sql = "INSERT INTO comment (topicId, userId, content, comTime) VALUES ('$topId', '$uid', '$comment', now());";
    $conn = mysql_query($sql);
    if (!$conn) 
    {
        echo 'Mysql error: ' . mysql_error();
        exit;
    }

}

$redirect="Location:/ProjectManagementTeam21/topicDetail.php?tid=".$topId;
header($redirect);
?>