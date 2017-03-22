<?php
session_start();
include "inc/connectDB.php";

if(isset($_SESSION["username"]))
{
    $username=$_SESSION["username"];
    $userinfo=mysql_query("select * from user where username='$username'");
    $user=mysql_fetch_array($userinfo);
    $uid=$user['uid'];
    $name=$user['name'];
    $admin=$user['isAdmin'];
}

$query=mysql_query("select catid, catName, catDesc from category");
$new=array();
$x=1;
while($row = mysql_fetch_array($query,MYSQL_ASSOC)){
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

                                        <div class="row home-category-list-area">
                                                <div class="span8">
                                                        <h2>Categories</h2>
                                                </div>
                                        </div>

                                        <div class="row-fluid top-cats">
                                        <?php
                                        $i = 1;
                                        $cnt = 1;

                                        for($i = 1; $i < $x; $i++)
                                        {
                                        ?>
                                                <section class="span4">
                                                        <h4 class="category"><a href="topicList.php?cid=<?php echo $new[$i]['catid'];?>"><?php echo $new[$i]['catName'];?></a></h4>
                                                        <div class="category-description">
                                                                <p><?php echo $new[$i]['catDesc'];?></p>
                                                        </div>
                                                </section>
                                                <?php
                                                $cnt++;
                                                if($cnt == 4)
                                                {
                                                ?>
                                        </div>
                                        <div class="row-fluid top-cats">
                                        <?php
                                                $cnt = 1;
                                            }
                                        }
                                        ?>
                                        </div>
                                </div>
                                <!-- End of page content -->

                                <? require("sidebar.php"); ?>

                        </div>
        </div>
        <!-- End of Page Container -->

<?php require("footer.php");?>