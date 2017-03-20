<?php 

session_start();        
session_unset();        
session_destroy();      
header("location: /ProjectManagementTeam21/index.php");

?>
