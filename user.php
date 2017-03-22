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

$usId=$_GET["userid"];

$query="select * from topic where userId='$usId'";
$result=mysql_query($query);
$totalnum=mysql_num_rows($result);
$pagesize=10;

if(isset($_GET['page'])){
$page=$_GET['page'];
}
//$page=$_GET["page"];
if(isset($page)==""){
$page=1;
}

$begin=($page-1)*$pagesize;
$totalpage=ceil($totalnum/$pagesize);
$datanum=mysql_num_rows($result);

$query1=mysql_query("select * from topic,user,category where topic.userId=user.uid and topic.categoryId=category.catid and user.uid='$usId' order by topTime desc LIMIT $begin, $pagesize");
$new=array();
$x=1;
while($row = mysql_fetch_array($query1,MYSQL_ASSOC)){
    $new[$x] = $row;
    $x++;
}

$query3=mysql_query("select * from user where uid='$usId'");
$userinfo=mysql_fetch_array($query3,MYSQL_ASSOC);
//print_r($userinfo);

require("header.php");
?>

        <!-- Start of Page Container -->
        <div class="page-container">
                <div class="container">
                        <div class="row">

                                <!-- start of page content -->
                                <div class="span8 page-content">

                                        <!-- Basic Home Page Template -->
                                        <div class="row separator">
			                                <section class="span8">
			                                        <h3><?php echo $userinfo['name']; ?></h3>
			                                        <ul class="articles">
			                                                <?php
			                                                $i = 1;

			                                                for($i = 1; $i < $x; $i++)
			                                                {
			                                                ?>
			                                                <li class="article-entry standard">
			                                                        <h4><a href="topicDetail.php?tid=<?php echo $new[$i]['tid']; ?>"><?php echo $new[$i]['title']; ?></a></h4>
			                                                        <span class="article-meta"><?php echo $new[$i]['topTime']; ?> in <a href="topicList.php?cid=<?php echo $new[$i]['catid']?>"><?php echo $new[$i]['catName']; ?></a></span>
			                                                </li>
			                                                <?php
			                                                }
			                                                ?>
			                                                
			                                                <br>
			                                            
			                                                <?php if($totalpage!=1) { ?>
			                                                    <li id="pagination">
			                                                    <?php if($page!=1){ ?>
			                                                        <a href="topicList.php?cid=<?php echo $catId; ?>&page=<?php echo $page-1;?>" class="btn">Previous</a>
			                                                    <?php } ?>
			                                                    <?php for($j=1;$j<=$totalpage;$j++) { 
			                                                            if($j==$page) { ?>
			                                                                <a href="topicList.php?cid=<?php echo $catId; ?>&page=<?php echo $j;?>" class="btn active"><?php echo $j;?></a>
			                                                            <?php } else {?>
			                                                                <a href="topicList.php?cid=<?php echo $catId; ?>&page=<?php echo $j;?>" class="btn"><?php echo $j;?></a>
			                                                            <?php } ?>
			                                                    <?php } ?>
			                                                    <?php if($page<$totalpage){ ?>
			                                                        <a href="topicList.php?cid=<?php echo $catId; ?>&page=<?php echo $page+1;?>" class="btn">Next</a>
			                                                    <?php } ?>                                                    
			                                                </li>
			                                                <?php } ?>
			                                                
			                                        </ul>
			                                        
			                                </section>
                                        </div>
                                </div>
                                <!-- end of page content -->
                                
                                <!-- start of userinfo -->
								<aside class="span4 page-sidebar">

								        <section class="widget">
									        <div>
									    		<h3 class="title">User Information</h3>
									    		<p>
									    			Name: <?php echo $userinfo['name']; ?></br>
									                Gender: <?php echo $userinfo['gender']; ?></br>
									                Email: <?php echo $userinfo['email']; ?></br>
									                About: <?php echo $userinfo['about']; ?>
									    		</p>
									        </div>
 								        </section>

								        <section class="widget">
								                <div class="support-widget">
								                        <h3 class="title">Support</h3>
								                        <p class="intro">Need more support? If you did not found an answer, contact us for further help.</p>
								                </div>
								        </section>

								</aside>
								<!-- end of userinfo -->

                                </div>
                        </div>
        </div>
        <!-- End of Page Container -->

<?php require("footer.php");?>