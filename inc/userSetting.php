<?php
session_start();
include("connectDB.php");

//echo $topId;

if(isset($_SESSION["username"])){
$username=$_SESSION["username"];
$userinfo=mysql_query("select * from user where username='$username'");
$user=mysql_fetch_array($userinfo);
}

$email=$_POST['email'];
$about=$_POST['about'];

echo $email;

if(!empty($email))
{
    $sql = "update user set email = '$email' where uid = ".$user['uid'];
    $conn = mysql_query($sql);
    if (!$conn) 
    {
        echo 'Mysql error: ' . mysql_error();
        exit;
    }

}

if(!empty($about))
{
    $sql1 = "update user set about = '$about' where uid = ".$user['uid'];
    $conn1 = mysql_query($sql1);
    if (!$conn1) 
    {
        echo 'Mysql error: ' . mysql_error();
        exit;
    }

}

$redirect="Location:/ProjectManagementTeam21/user.php?userid=".$user['uid'];
header($redirect);
?>