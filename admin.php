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

<<<<<<< HEAD
	//防止重复提交表单
	$flag=mt_rand(0, 1000000);
	$_SESSION['flag']=$flag;

	if(isset($_POST['topicID'])){
		mysql_query("DELETE from category where catid=".$_POST['topicID'].";");
		unset($_POST['topicID']);
		header("Location:/ProjectManagementTeam21/admin.php");
	}
	if(isset($_POST['topicname'])&&$_SESSION['flag']==$flag){
		mysql_query("insert into category(catName, catDesc) values('".$_POST['topicname']."', '".$_POST['description']."');");
		unset($_POST['topicname']);
		unset($_POST['description']);
		header("Location:/ProjectManagementTeam21/admin.php");
	}
=======
	

>>>>>>> origin/master
?>

<!-- Start of Page Container -->
<div class="page-container">
    <div class="container">
    	<div class="row">
        	<form action="admin.php" method="post">
<<<<<<< HEAD
        		Topic ID:<input type="text" name="topicID">
        		<input type="submit" name="delete" value="Delete Topic">
        	</form>
        	<br>
        	<form action="admin.php" method="post">
        	  	<input type="submit" name="add" value="Add Topic">
        	  	<input type="hidden" name="originator" value="<?php echo $flag;?>"> <!--隐藏input数据，防止重复提交 -->
        		Topic Name:<input type="text" name="topicname"><br>
  				Topic Description:<input type="text" name="description"><br>
=======
        		Topic ID:<input type="text" name="ID">
        		Delete Topic<input type="radio" name="operation" value="delete">
  				Add Topic<input type="radio" name="operation" value="add">
        		<input type="submit">
>>>>>>> origin/master
        	</form>
        </div>
        <div class="row">
        	<table border="1">
<<<<<<< HEAD
        		<tr><td>Topic ID</td><td>Topic Name</td><td>Description</td><td>Time</td></tr>
	        	<?php 
	        		foreach($arr as $value){ 
						echo "<tr><td>".$value['catid']."</td><td>".$value['catName']."</td><td>".$value['catDesc']."</td><td>".$value['catTime']."</td></tr>"; 
=======
        		<tr><td>Topic ID</td><td>Topic Name</td><td>Description</td></tr>
	        	<?php 
	        		foreach($arr as $value){ 
						echo "<tr><td>".$value['catid']."</td><td>".$value['catName']."</td><td>".$value['catDesc']."</td></tr>"; 
>>>>>>> origin/master
					} 
	        	?>	
        	</table>
        </div>
    </div>
</div>


<?php require_once("footer.php");?>