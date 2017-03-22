<?php
session_start();
include("connectDB.php");
//include("redirect.php");

//echo $topId;

if(isset($_SESSION["username"])){
$username=$_SESSION["username"];
$userinfo=mysql_query("select * from user where username='$username'");
$user=mysql_fetch_array($userinfo);
}

$old=$_POST['oldpassword'];
$new=$_POST['newpassword'];

if($user['password']!=$old)
{
	//redirect('set_password.php', 3, '原密码输入错误，3秒钟返回！');
	//echo "<script>alert('原密码输入错误!');history.back();</script>";
	exit;
}
else
{
	$sql1="update user set password='$new' where uid=".$user['uid'];
	$conn1 = mysql_query($sql1);
    if (!$conn1) 
    {
        echo 'Mysql error: ' . mysql_error();
        exit;
    }
	//redirect('set_password.php', 3, '密码修改成功，跳转中。。。');
	//echo "<script>alert('密码修改成功!');history.back();</script>";
	exit;
}

$redirect="Location:/ProjectManagementTeam21/user.php?userid=".$user['uid'];
header($redirect);
?>