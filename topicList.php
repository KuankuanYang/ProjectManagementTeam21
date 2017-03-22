<?php
session_start();
include("inc/connectDB.php");

if(isset($_SESSION["username"])){
    $username=$_SESSION["username"];
    $userinfo=mysql_query("select * from user where username='$username'");
    $user=mysql_fetch_array($userinfo);
    $uid=$user['uid'];
    $name=$user['name'];
    $admin=$user['isAdmin'];
}

$catId=$_GET["cid"];

$query="select * from topic where categoryId='$catId'";
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

$query1=mysql_query("select * from topic,user where topic.userId=user.uid and categoryId='$catId' order by topTime desc LIMIT $begin, $pagesize");
$new=array();
$x=1;
while($row = mysql_fetch_array($query1,MYSQL_ASSOC)){
    $new[$x] = $row;
    $x++;
}

$query2=mysql_query("select catName from category where catid='$catId'");
$category=mysql_fetch_array($query2,MYSQL_ASSOC);

//print_r($new[1]['name']);

require("header.php");
?>

<script type="text/javascript">
    function SwapTxt()
    {
        var txt = document.getElementById("content").value;//获取文本框里的值 
        document.getElementById("lyny").innerHTML=txt;//在#lyny显示文本框的值
    }

    function doCheck()
    {
        var title = document.getElementById("title");
        var content = document.getElementById("content").value;
        
        if(title.value=="")
        {
            alert("Please enter the title.");
            return false;
        }

        if(content.value=="")
        {
            alert("Please enter the content.");
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

                        <!-- Basic Home Page Template -->
                        <div class="row separator">
                                <section class="span8">
                                        <h3><?php echo $category['catName']; ?></h3>
                                        <ul class="articles">
                                                <?php
                                                if($totalnum<1){
                                                ?>
                                                    <li><p>Oops! There is no topic under this category yet.</p></li>
                                                <?php
                                                } else {
                                                $i = 1;

                                                for($i = 1; $i < $x; $i++)
                                                {
                                                ?>
                                                <li class="article-entry standard">
                                                        <h4><a href="topicDetail.php?tid=<?php echo $new[$i]['tid']; ?>"><?php echo $new[$i]['title']; ?></a></h4>
                                                        <span class="article-meta"><?php echo $new[$i]['topTime']; ?> - <a href="#"><?php echo $new[$i]['name']; ?></a></span>
                                                        
                                                </li>
                                                <?php
                                                    }
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

                                <!--New Topic-->
                                <section class="span8">
                                        <div id="respond">

                                                <h4>New Topic</h4>
                                                <?php
                                                if(isset($_SESSION["username"])){ ?>
                                                    <form action="inc/newTopic.php?cid=<?php echo $catId ?>" method="post" id="newTopic" onsubmit="return doCheck()">

                                                        <div>
                                                                <label for="title">Title</label>
                                                                <input class="span8" type="text" name="title" id="title" value="" size="22" >
                                                        </div>


                                                        <div>
                                                                <label for="content">Content</label>
                                                                
                                                                <textarea name="content" cols="58" rows="10" class="span8" id="content" onkeyup="SwapTxt()"></textarea>
                                                                
                                                        </div>

                                                        <p class="allowed-tags">You can use these HTML tags and attributes <small><code>&lt;a href="" title=""&gt; &lt;abbr title=""&gt; &lt;acronym title=""&gt; &lt;b&gt; &lt;blockquote cite=""&gt; &lt;cite&gt; &lt;code&gt; &lt;del datetime=""&gt; &lt;em&gt; &lt;i&gt; &lt;q cite=""&gt; &lt;strike&gt; &lt;strong&gt; </code></small></p>

                                                        <p id="lyny">You could preview your content here.</p>

                                                        <div>
                                                                <input class="btn" name="submit" type="submit" id="submit"  value="Submit">
                                                                <input class="btn" name="reset" type="reset" id="reset" value="Reset">
                                                        </div>

                                                </form>
                                                <?php } else { ?>                                                
                                                <p>Please log in before starting a new topic.</p>
                                                <?php } ?>
                                        </div>
                                </section>

                        </div>

                </div>
                <!-- end of page content -->

                <?php require("sidebar.php"); ?>

                </div>
        </div>
</div>
<!-- End of Page Container -->

<?php
require("footer.php");
?>