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

$query1=mysql_query("select * from topic,user,category where topic.userId=user.uid and topic.categoryId=category.catid order by topTime desc LIMIT 0, 10");
$new=array();
$x=1;
while($row = mysql_fetch_array($query1,MYSQL_ASSOC)){
    $new[$x] = $row;
    $x++;
}

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
                                                <section class="span8 articles-list">
                                                        <h3>Latest Topics</h3>
                                                        <ul class="articles">
                                                        <?php
                                                                $i = 1;

                                                                for($i = 1; $i < $x; $i++)
                                                                {
                                                                ?>
                                                                <li class="article-entry standard">
                                                                        <h4><a href="topicDetail.php?tid=<?php echo $new[$i]['tid']; ?>"><?php echo $new[$i]['title']; ?></a></h4>
                                                                        <span class="article-meta"><a href="user.php?userid=<?php echo $new[$i]['uid']?>"><?php echo $new[$i]['name']; ?></a> at <?php echo $new[$i]['topTime']; ?> in <a href="topicList.php?cid=<?php echo $new[$i]['catid']?>"><?php echo $new[$i]['catName']; ?></a></span>
                                                                        
                                                                </li>
                                                                <?php
                                                                }
                                                        ?>
                                                        </ul>
                                                </section>
                                        </div>
                                </div>
                                <!-- end of page content -->

                                <?php require("sidebar.php"); ?>

                                </div>
                        </div>
        </div>
        <!-- End of Page Container -->

<?php require("footer.php");?>
