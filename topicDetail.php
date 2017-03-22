<?php
session_start();
include "inc/connectDB.php";

$tid=$_GET["tid"];

if(isset($_SESSION["username"])){
        $username=$_SESSION["username"];
        $userinfo=mysql_query("select * from user where username='$username'");
        $user=mysql_fetch_array($userinfo);
        $uid=$user['uid'];
        $name=$user['name'];
        $admin=$user['isAdmin'];
}

$sql="select * from topic where tid=".$tid;
$query=mysql_query($sql);
$topic=mysql_fetch_array($query,MYSQL_ASSOC);
//print_r($topic);

$sql1="select catid,catName from category where catid=".$topic['categoryId'];
$query1=mysql_query($sql1);
$category=mysql_fetch_array($query1,MYSQL_ASSOC);

$sql2="select uid,name from user where uid=".$topic['userId'];
$query2=mysql_query($sql2);
$author=mysql_fetch_array($query2,MYSQL_ASSOC);

$query4="select * from comment where topicId=$tid";
$result=mysql_query($query4);
$totalnum=mysql_num_rows($result);
$pagesize=1;

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

$sql3="select * from comment,user where comment.userId=user.uid and comment.topicId=".$tid." LIMIT $begin, $pagesize";
$query3=mysql_query($sql3);
$comment=array();
$x=1;
while($row = mysql_fetch_array($query3,MYSQL_ASSOC)){
        $comment[$x] = $row;
        $x++;
}
//print_r($comment[1]['name']);

require("header.php");
?>

<script type="text/javascript">
        function SwapTxt()
        {
                var txt = document.getElementById("comment").value;
                document.getElementById("lyny").innerHTML=txt;
        }

        function doCheck()
        {
                var content = document.getElementById("comment").value;

                if(content.value=="")
                {
                        alert("Please enter the comment.");
                        return false;
                }
        }
</script>

<!-- Start of Page Container -->
<div class="page-container">
        <div class="container">
                <div class="row">

                        <!-- start of page content -->
                        <div class="span8 page-content">

                                <ul class="breadcrumb">
                                        <li><a href="categoryList.php">Category List</a><span class="divider">/</span></li>
                                        <li><a href="topicList.php?cid=<?php echo $category['catid']; ?>" title="View all posts in the category"><?php echo $category['catName']; ?></a> <span class="divider">/</span></li>
                                        <li class="active"><?php echo $topic['title']; ?></li>
                                </ul>

                                <article class=" type-post format-standard hentry clearfix">

                                        <h1 class="post-title"><?php echo $topic['title']; ?></h1>

                                        <div class="post-meta clearfix">
                                                <span class="date"><?php echo $topic['topTime']; ?></span>
                                                <span class="category"><a href="categoryList.php?cid=<?php echo $category['catid']; ?>" title="View all posts"><?php echo $category['catName']; ?></a></span>
                                                <span class="author"><?php echo $author['name'];?></span>
                                                <span class="comments"><a href="#" title="Comment on Integrating WordPress with Your Website"><?php echo $totalnum; ?> Comments</a></span>

                                        </div><!-- end of post meta -->

                                        <div>
                                                <?php echo $topic['content']; ?>     
                                        </div>

                                </article>

                                <section id="comments">

                                        <h4 id="comments-title"><?php echo $totalnum; ?> Comments</h4>

                                        <ol class="commentlist">

                                                <?php
                                                $i = 1;

                                                for($i = 1; $i < $x; $i++)
                                                {
                                                ?>

                                                <li class="comment even thread-even depth-1" id="li-comment-2">
                                                        <article>
                                                                
                                                                <div class="comment-meta">

                                                                        <h5 class="author">
                                                                                <cite class="fn">
                                                                                        <a href="#" rel="external nofollow" class="url"><?php echo $comment[$i]['name']; ?></a>
                                                                                </cite>
                                                                                - <time><?php echo $comment[$i]['comTime']; ?></time>
                                                                        </h5>

                                                                </div><!-- end .comment-meta -->
                                                                        <?php echo $comment[$i]['content']; ?>
                                                                <div class="comment-body">
                                                                        
                                                                </div><!-- end of comment-body -->

                                                        </article><!-- end of comment -->

                                                </li>
                                                <?php
                                                }
                                                ?>

                                                <br>
                                            
                                                <?php if($totalpage!=1) { ?>
                                                    <li id="pagination">
                                                    <?php if($page!=1){ ?>
                                                        <a href="topicDetail.php?tid=<?php echo $tid; ?>&page=<?php echo $page-1;?>" class="btn">Previous</a>
                                                    <?php } ?>
                                                    <?php for($j=1;$j<=$totalpage;$j++) { 
                                                            if($j==$page) { ?>
                                                                <a href="topicDetail.php?tid=<?php echo $tid; ?>&page=<?php echo $j;?>" class="btn active"><?php echo $j;?></a>
                                                            <?php } else {?>
                                                                <a href="topicDetail.php?tid=<?php echo $tid; ?>&page=<?php echo $j;?>" class="btn"><?php echo $j;?></a>
                                                            <?php } ?>
                                                    <?php } ?>
                                                    <?php if($page<$totalpage){ ?>
                                                        <a href="topicDetail.php?tid=<?php echo $tid; ?>&page=<?php echo $page+1;?>" class="btn">Next</a>
                                                    <?php } ?>                                                    
                                                </li>
                                                <?php } ?>

                                        </ol>

                                        <div id="respond">

                                                <h3>Leave a Comment</h3>

                                                <form action="inc/newComment.php?tid=<?php echo $tid ?>" method="post" id="commentform">

                                                        <div>
                                                                <label for="comment">Comment</label>
                                                                <textarea class="span8" name="comment" id="comment" cols="58" rows="10" onkeyup="SwapTxt()"></textarea>
                                                        </div>

                                                        <p class="allowed-tags">You can use these HTML tags and attributes <small><code>&lt;a href="" title=""&gt; &lt;abbr title=""&gt; &lt;acronym title=""&gt; &lt;b&gt; &lt;blockquote cite=""&gt; &lt;cite&gt; &lt;code&gt; &lt;del datetime=""&gt; &lt;em&gt; &lt;i&gt; &lt;q cite=""&gt; &lt;strike&gt; &lt;strong&gt; </code></small></p>

                                                        <p id="lyny">You could preview your comment here.</p>
                                                        
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
