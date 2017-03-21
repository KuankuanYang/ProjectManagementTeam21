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

	require_once("header.php");

	$query="SELECT * FROM category";
	$result=mysql_query($query);
	if(!$result){
		echo "Wrong to get data";
	}
	elseif (is_bool($result)&&$result) {//判断返回值的类型是否仅是bool型且为true，而不是查询所得的指针集
		echo "Wrong to get data";
	}
	else{
		$arr=array();
		while($row=mysql_fetch_array($result, MYSQL_ASSOC)){
				array_push($arr, $row);
		}
	}

	

?>

<!-- Start of Page Container -->
<div class="page-container">
    <div class="container">
    	<div class="row">
        	<form action="admin.php" method="post">
        		Topic ID:<input type="text" name="ID">
        		Delete Topic<input type="radio" name="operation" value="delete">
  				Add Topic<input type="radio" name="operation" value="add">
        		<input type="submit">
        	</form>
        </div>
        <div class="row">
        	<table border="1">
        		<tr><td>Topic ID</td><td>Topic Name</td><td>Description</td></tr>
	        	<?php 
	        		foreach($arr as $value){ 
						echo "<tr><td>".$value['catid']."</td><td>".$value['catName']."</td><td>".$value['catDesc']."</td></tr>"; 
					} 
	        	?>	
        	</table>
        </div>
    </div>
</div>


<?php require_once("footer.php");?>