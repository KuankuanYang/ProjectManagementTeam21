<?php
session_start();
include "inc/connectDB.php";

$tid=$_GET["tid"];

//头部导航
if(isset($_SESSION["username"])){
$username=$_SESSION["username"];
$userinfo=mysql_query("select * from user where username='$username'");
$user=mysql_fetch_array($userinfo);
$uid=$user['uid'];
$name=$user['name'];
$admin=$user['isAdmin'];
}

$query=mysql_query("select * from topic where tid='$tid'");
$topic=mysql_fetch_array($query,MYSQL_ASSOC);
//print_r($topic);

$sql1="select catid,catName from category where catid=".$topic['categoryId'];
$query1=mysql_query($sql1);
$category=mysql_fetch_array($query1,MYSQL_ASSOC);

$sql2="select uid,name from user where uid=".$topic['userId'];
$query2=mysql_query($sql2);
$author=mysql_fetch_array($query2,MYSQL_ASSOC);

$query3=mysql_query("select * from comment,user where comment.userId=user.uid and topicId='$tid'");
$comment=array();
$x=1;
while($row = mysql_fetch_array($query,MYSQL_ASSOC)){
        $comment[$x] = $row;
        $x++;
}
//print_r($comment);

require("header.php");
?>

<!-- Start of Page Container -->
<div class="page-container">
        <div class="container">
                <div class="row">

                        <!-- start of page content -->
                        <div class="span8 page-content">

                                <ul class="breadcrumb">
                                        <li><a href="categoryList.php">Category List</a><span class="divider">/</span></li>
                                        <li><a href="topicList.php?cid=<?php echo $category['cid']; ?>" title="View all posts in the category"><?php echo $category['catName']; ?></a> <span class="divider">/</span></li>
                                        <li class="active"><?php echo $topic['title']; ?></li>
                                </ul>

                                <article class=" type-post format-standard hentry clearfix">

                                        <h1 class="post-title"><?php echo $topic['title']; ?></h1>

                                        <div class="post-meta clearfix">
                                                <span class="date"><?php echo $topic['topTime']; ?></span>
                                                <span class="category"><a href="categoryList.php?cid=<?php echo $category['cid']; ?>" title="View all posts"><?php echo $category['catName']; ?></a></span>
                                                <span class="author"><?php echo $author['name'];?></span>
                                                <span class="comments"><a href="#" title="Comment on Integrating WordPress with Your Website">3 Comments</a></span>

                                        </div><!-- end of post meta -->

                                        <div>
                                                <?php echo $topic['content']; ?>     
                                        </div>

                                </article>

                                <section id="comments">

                                        <h3 id="comments-title">(3) Comments</h3>

                                        <ol class="commentlist">

                                                <li class="comment even thread-even depth-1" id="li-comment-2">
                                                        <article id="comment-2">

                                                                <a href="#">
                                                                        <img alt="" src="http://1.gravatar.com/avatar/50a7625001317a58444a20ece817aeca?s=60&amp;d=http%3A%2F%2F1.gravatar.com%2Favatar%2Fad516503a11cd5ca435acc9bb6523536%3Fs%3D60&amp;r=G" class="avatar avatar-60 photo" height="60" width="60">
                                                                </a>

                                                                <div class="comment-meta">

                                                                        <h5 class="author">
                                                                                <cite class="fn">
                                                                                        <a href="#" rel="external nofollow" class="url">John Doe</a>
                                                                                </cite>
                                                                                - <a class="comment-reply-link" href="#">Reply</a>
                                                                        </h5>

                                                                        <p class="date">
                                                                                <a href="#">
                                                                                        <time datetime="2013-02-26T13:18:47+00:00">February 26, 2013 at 1:18 pm</time>
                                                                                </a>
                                                                        </p>

                                                                </div><!-- end .comment-meta -->

                                                                <div class="comment-body">
                                                                        <p>Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi.</p>
                                                                        <p>Nam liber tempor cum soluta nobis eleifend option congue nihil imperdiet doming id quod mazim placerat facer possim assum. Typi non habent claritatem insitam; est usus legentis in iis qui facit eorum claritatem.</p>
                                                                </div><!-- end of comment-body -->

                                                        </article><!-- end of comment -->

                                                        <ul class="children">

                                                                <li class="comment byuser comment-author-saqib-sarwar bypostauthor odd alt depth-2" id="li-comment-3">
                                                                        <article id="comment-3">

                                                                                <a href="#">
                                                                                        <img alt="" src="http://0.gravatar.com/avatar/2df5eab0988aa5ff219476b1d27df755?s=60&amp;d=http%3A%2F%2F0.gravatar.com%2Favatar%2Fad516503a11cd5ca435acc9bb6523536%3Fs%3D60&amp;r=G" class="avatar avatar-60 photo" height="60" width="60">
                                                                                </a>

                                                                                <div class="comment-meta">

                                                                                        <h5 class="author">
                                                                                                <cite class="fn">saqib sarwar</cite>
                                                                                                - <a class="comment-reply-link" href="#">Reply</a>
                                                                                        </h5>

                                                                                        <p class="date">
                                                                                                <a href="#">
                                                                                                        <time datetime="2013-02-26T13:20:14+00:00">February 26, 2013 at 1:20 pm</time>
                                                                                                </a>
                                                                                        </p>

                                                                                </div><!-- end .comment-meta -->

                                                                                <div class="comment-body">
                                                                                        <p>Nam liber tempor cum soluta nobis eleifend option congue nihil imperdiet doming id quod mazim placerat facer possim assum. Typi non habent claritatem insitam; est usus legentis in iis qui facit eorum claritatem. Investigationes demonstraverunt lectores legere me lius quod ii legunt saepius. Claritas est etiam processus dynamicus, qui sequitur mutationem consuetudium lectorum. Mirum est notare quam littera gothica, quam nunc putamus parum claram, anteposuerit litterarum formas humanitatis per seacula quarta decima et quinta decima. Eodem modo typi, qui nunc nobis videntur parum clari, fiant sollemnes in futurum.</p>
                                                                                </div><!-- end of comment-body -->

                                                                        </article><!-- end of comment -->

                                                                </li>
                                                        </ul>
                                                </li>

                                                <li class="comment even thread-odd thread-alt depth-1" id="li-comment-4">
                                                        <article id="comment-4">

                                                                <a href="#">
                                                                        <img alt="" src="http://1.gravatar.com/avatar/50a7625001317a58444a20ece817aeca?s=60&amp;d=http%3A%2F%2F1.gravatar.com%2Favatar%2Fad516503a11cd5ca435acc9bb6523536%3Fs%3D60&amp;r=G" class="avatar avatar-60 photo" height="60" width="60">
                                                                </a>

                                                                <div class="comment-meta">

                                                                        <h5 class="author">
                                                                                <cite class="fn"><a href="#" rel="external nofollow" class="url">John Doe</a></cite>
                                                                                - <a class="comment-reply-link" href="#">Reply</a>
                                                                        </h5>

                                                                        <p class="date">
                                                                                <a href="http://knowledgebase.inspirythemes.com/integrating-wordpress-with-your-website/#comment-4">
                                                                                        <time datetime="2013-02-26T13:27:04+00:00">February 26, 2013 at 1:27 pm</time>
                                                                                </a>
                                                                        </p>

                                                                </div><!-- end .comment-meta -->

                                                                <div class="comment-body">
                                                                        <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. </p>
                                                                        <p>Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi. Nam liber tempor cum soluta nobis eleifend option congue nihil imperdiet doming id quod mazim placerat facer possim assum.</p>
                                                                </div><!-- end of comment-body -->

                                                        </article><!-- end of comment -->
                                                </li>
                                        </ol>

                                        <div id="respond">

                                                <h3>Leave a Comment</h3>

                                                <form action="/control/newComment.php?tid=<?php echo $tid ?>" method="post" id="commentform">

                                                        <div>
                                                                <label for="comment">Comment</label>
                                                                <textarea class="span8" name="comment" id="comment" cols="58" rows="10"></textarea>
                                                        </div>
                                                        
                                                        <div>
                                                                <input class="btn" name="submit" type="submit" id="submit"  value="Submit">
                                                                <input class="btn" name="reset" type="reset" id="reset" value="Reset">
                                                        </div>

                                                </form>

                                        </div>

                                </section><!-- end of comments -->

                        </div>
                        <!-- end of page content -->

                        <?php require("sidebar.php"); ?>

                </div>
        </div>
</div>
<!-- End of Page Container -->

<?php require("footer.php"); ?>
