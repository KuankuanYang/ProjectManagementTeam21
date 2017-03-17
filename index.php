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
                                                <section class="span4 articles-list">
                                                        <h3>Featured Articles</h3>
                                                        <ul class="articles">
                                                                <li class="article-entry standard">
                                                                        <h4><a href="single.html">Integrating WordPress with Your Website</a></h4>
                                                                        <span class="article-meta">25 Feb, 2013 in <a href="#" title="View all posts in Server &amp; Database">Server &amp; Database</a></span>
                                                                        <span class="like-count">66</span>
                                                                </li>
                                                                <li class="article-entry standard">
                                                                        <h4><a href="single.html">WordPress Site Maintenance</a></h4>
                                                                        <span class="article-meta">24 Feb, 2013 in <a href="#" title="View all posts in Website Dev">Website Dev</a></span>
                                                                        <span class="like-count">15</span>
                                                                </li>
                                                                <li class="article-entry video">
                                                                        <h4><a href="single.html">Meta Tags in WordPress</a></h4>
                                                                        <span class="article-meta">23 Feb, 2013 in <a href="#" title="View all posts in Website Dev">Website Dev</a></span>
                                                                        <span class="like-count">8</span>
                                                                </li>
                                                                <li class="article-entry image">
                                                                        <h4><a href="single.html">WordPress in Your Language</a></h4>
                                                                        <span class="article-meta">22 Feb, 2013 in <a href="#" title="View all posts in Advanced Techniques">Advanced Techniques</a></span>
                                                                        <span class="like-count">6</span>
                                                                </li>
                                                                <li class="article-entry standard">
                                                                        <h4><a href="single.html">Know Your Sources</a></h4>
                                                                        <span class="article-meta">22 Feb, 2013 in <a href="#" title="View all posts in Website Dev">Website Dev</a></span>
                                                                        <span class="like-count">2</span>
                                                                </li>
                                                                <li class="article-entry standard">
                                                                        <h4><a href="single.html">Validating a Website</a></h4>
                                                                        <span class="article-meta">21 Feb, 2013 in <a href="#" title="View all posts in Website Dev">Website Dev</a></span>
                                                                        <span class="like-count">3</span>
                                                                </li>
                                                        </ul>
                                                </section>

                                                <section class="span4 articles-list">
                                                        <h3>Latest Articles</h3>
                                                        <ul class="articles">
                                                                <li class="article-entry standard">
                                                                        <h4><a href="single.html">Integrating WordPress with Your Website</a></h4>
                                                                        <span class="article-meta">25 Feb, 2013 in <a href="#" title="View all posts in Server &amp; Database">Server &amp; Database</a></span>
                                                                        <span class="like-count">66</span>
                                                                </li>
                                                                <li class="article-entry standard">
                                                                        <h4><a href="single.html">Using Javascript</a></h4>
                                                                        <span class="article-meta">25 Feb, 2013 in <a href="#" title="View all posts in Advanced Techniques">Advanced Techniques</a></span>
                                                                        <span class="like-count">18</span>
                                                                </li>
                                                                <li class="article-entry image">
                                                                        <h4><a href="single.html">Using Images</a></h4>
                                                                        <span class="article-meta">25 Feb, 2013 in <a href="#" title="View all posts in Designing in WordPress">Designing in WordPress</a></span>
                                                                        <span class="like-count">7</span>
                                                                </li>
                                                                <li class="article-entry video">
                                                                        <h4><a href="single.html">Using Video</a></h4>
                                                                        <span class="article-meta">24 Feb, 2013 in <a href="#" title="View all posts in WordPress Plugins">WordPress Plugins</a></span>
                                                                        <span class="like-count">7</span>
                                                                </li>
                                                                <li class="article-entry standard">
                                                                        <h4><a href="single.html">WordPress Site Maintenance</a></h4>
                                                                        <span class="article-meta">24 Feb, 2013 in <a href="#" title="View all posts in Website Dev">Website Dev</a></span>
                                                                        <span class="like-count">15</span>
                                                                </li>
                                                                <li class="article-entry standard">
                                                                        <h4><a href="single.html">WordPress CSS Information and Techniques</a></h4>
                                                                        <span class="article-meta">24 Feb, 2013 in <a href="#" title="View all posts in Theme Development">Theme Development</a></span>
                                                                        <span class="like-count">1</span>
                                                                </li>
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
