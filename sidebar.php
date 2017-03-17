<?php
$cat1=mysql_query("select * from category where catSet=1");
$cat2=mysql_query("select * from category where catSet=2");
$cat3=mysql_query("select * from category where catSet=3");
$cat4=mysql_query("select * from category where catSet=4");
?>


<!-- start of sidebar -->
<aside class="span4 page-sidebar">

        <section class="widget"><h3 class="title">Featured Categories</h3>
                <ul>
                        <?php while ($cate1=mysql_fetch_array($cat1)) { ?>
                        <li><a href="topicList.php?cid=<?php echo $cate1['catid'];?>"><?php echo $cate1['catName'];?></a></li>
                        <?php } ?>
                        <?php while ($cate2=mysql_fetch_array($cat2)) { ?>
                        <li><a href="topicList.php?cid=<?php echo $cate2['catid'];?>"><?php echo $cate2['catName'];?></a></li>
                        <?php } ?>
                        <?php while ($cate3=mysql_fetch_array($cat3)) { ?>
                        <li><a href="topicList.php?cid=<?php echo $cate3['catid'];?>"><?php echo $cate3['catName'];?></a></li>
                        <?php } ?>
                        <?php while ($cate4=mysql_fetch_array($cat4)) { ?>
                        <li><a href="topicList.php?cid=<?php echo $cate4['catid'];?>"><?php echo $cate4['catName'];?></a></li>
                        <?php } ?>
                        <li><a href="categoryList.php">View All Categories</a></li>
                </ul>
        </section>

        <section class="widget">
                <h3 class="title">Recent Comments</h3>
                <ul id="recentcomments">
                        <li class="recentcomments"><a href="#" rel="external nofollow" class="url">John Doe</a> on <a href="#">Integrating WordPress with Your Website</a></li>
                        <li class="recentcomments">saqib sarwar on <a href="#">Integrating WordPress with Your Website</a></li>
                        <li class="recentcomments"><a href="#" rel="external nofollow" class="url">John Doe</a> on <a href="#">Integrating WordPress with Your Website</a></li>
                        <li class="recentcomments"><a href="#" rel="external nofollow" class="url">Mr WordPress</a> on <a href="#">Installing WordPress</a></li>
                </ul>
        </section>

        <section class="widget">
                <div class="support-widget">
                        <h3 class="title">Support</h3>
                        <p class="intro">Need more support? If you did not found an answer, contact us for further help.</p>
                </div>
        </section>

</aside>
<!-- end of sidebar -->