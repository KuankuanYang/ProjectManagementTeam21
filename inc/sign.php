<?php
include("connectDB.php");

if(isset($_POST['name'])){
$name=trim($_POST['name']);
}

if(isset($_POST['username'])){
$username=trim($_POST['username']);
}

if(isset($_POST['password'])){
$password=$_POST['password'];
}

if(isset($_POST['conpassword'])){
$conpassword=$_POST['conpassword'];
}

if(isset($_POST['email'])){
$email=trim($_POST['email']);
}

if(isset($_POST['gender'])){
$gender=trim($_POST['gender']);
}

if(!empty($username))
{
    $sql = "SELECT * FROM user WHERE username='$username'";
    $conn = mysql_query($sql);
    if ($conn && mysql_num_rows($conn) > 0) 
    {
        echo "<font color='red' size='5'>That username is taken. Try another.</font><br>\n";
    }
    else 
    {
        $sql = "INSERT INTO user (name, username, password, email, gender, cTime) VALUES ('$name', '$username', '$password', '$email', '$gender', now());";
        $conn = mysql_query($sql);
        if (!$conn) 
        {
            echo 'Mysql error: ' . mysql_error();
            exit;
        }
        header("Location:/ProjectManagementTeam21/logIn.php");
    }
}

/*
$sql = "insert into user(name,username,password,email,gender,cTime) values ('$_POST[name]','$_POST[username]','$_POST[password]','$_POST[email]','$_POST[gender]',now());";

if (!mysql_query($sql))
{
    die('Error: ' . mysql_error());
}

header("Location:/BBS_Website/logIn.php");*/

?>